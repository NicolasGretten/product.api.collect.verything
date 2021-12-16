<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use stdClass;


/**
 * Class Type
 * @method static select(string $string)
 * @method static where(string $string, mixed $product_id)
 */
class Product extends Model
{
    use SoftDeletes, Translatable;

    protected $connection = 'data';
    protected $table = 'products';
    protected $dates = ['created_at, updated_at, deleted_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $translatedAttributes = ['title', 'text'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['pivot', 'translations'];

    protected $appends = ['current_pricing', 'current_discount', 'original_pricing', 'discount', 'categories_id'];

    protected ?string $code = null;

    /*
     * Variable
     */
    public function code(string $code = null): Product
    {
        $this->code = $code;
        return $this;
    }

    /*
     * Appends attributes
     */
    public function getCurrentDiscountAttribute()
    {
        $discount = $this->applyDiscount($this->code);
        return $discount['current_discount'];
    }

    public function getCurrentPricingAttribute()
    {
        if ($this->getDiscountAttribute() != null) {
            $currentPricing = $this->applyDiscount($this->code);
            return $currentPricing['current_pricing'];
        }
        return $this->getOriginalPricingAttribute();
    }

    public function getDiscountAttribute()
    {
        $discount = $this->applyDiscount($this->code);
        return $discount['current_discount'];
    }

    public function getOriginalPricingAttribute()
    {
        if ($this->price()->exists()) {
            return $this->price()->first()->makeHidden('product_id', 'deleted_at', 'created_at', 'updated_at');
        }
        return null;
    }

    public function getCategoriesIdAttribute()
    {
        if ($this->categories()->exists()) {
            return $this->categories()->get();
        }
        return null;
    }

    /*
     * Gestion des discount et des prix
     * applique la remise et return le prix actuel avec le discount appliqué et le discount
     */
    public function applyDiscount(string $code = null)
    {

        $originalPrice = $this->getOriginalPricingAttribute();

        /*
         * si il existe seulement un discount sur le produit
         */
        if ($this->getDiscounts() != null && $this->getCategoryDiscount() === null)
        {
            $discount = $this->checkDiscount($this->getDiscounts(), $code);
            if ($discount === false || $discount === null){
                return $originalPrice;
            }
        }
        /*
         * si il existe seulement un discount sur la category
         */
        elseif ($this->getCategoryDiscount() != null && $this->getDiscounts() === null)
        {
            $discount = $this->checkDiscount($this->getCategoryDiscount(), $code);
            if ($discount === false || $discount === null){
                return $originalPrice;
            }
        }

        /*
         * si il existe un discount sur le produit et la category
         */
        elseif (($this->getCategoryDiscount() != null && $this->getDiscounts() != null))
        {
            /*
             * check des discount, en passant en paramètre les collection correspondante et le code si il existe
             */
            $checkDiscount = $this->checkDiscount($this->getDiscounts(), $code);
            $checkCategoryDiscount = $this->checkDiscount($this->getCategoryDiscount(), $code);

            /*
             * on check la valeur de retour des fonction en respectant une certaine régle dans les discount
             * 1) le code promo passe en priorité ensuite le discount sur un produit pour terminer le discount sur la category
             * 2) le produit peu au maximum avoir un discount appliqué et un code promo, idem pour la categorie
             * 3) un produit peut avoir en même temps un code promo provenant de sa categorie et un code promo applicable sur lui même, mais un seul peu être appliqué
             */

            if ($checkDiscount === null){
                $discount = $checkCategoryDiscount;
            }

            if ($checkCategoryDiscount === null){
                $discount = $checkDiscount;
            }

            /*
             * le discount sur le produit passe en priorité
             */
            if ($checkDiscount != null && $checkCategoryDiscount != null){
                $discount = $checkDiscount;
            }

            /*
             * si le code ne correspond a aucun des code appliqué on return le prix d'origine
             */
            if ( $checkDiscount === null && $checkCategoryDiscount === null){
                return $originalPrice;
            }
        }
        /*
         * si aucun discount existe je return le prix original
         */
        else {
            return $originalPrice;
        }

        /*
         * application des discount suivant leur type
         */
        switch ($discount->discount_type) {
            case "monetary":

                $discount->price_excluding_taxes = $originalPrice->price_excluding_taxes - $discount->amount;
                $discount->vat_value = $discount->price_excluding_taxes * ($originalPrice->vat_rate / 100);

                $discount->price_including_taxes = $discount->price_excluding_taxes * (1 + ($originalPrice->vat_rate / 100));
                break;
            case "percentage":

                $discount->price_excluding_taxes = $originalPrice->price_excluding_taxes - (($discount->amount / 100) * $originalPrice->price_excluding_taxes);
                $discount->vat_value = $discount->price_excluding_taxes * ($originalPrice->vat_rate / 100);

                $discount->price_including_taxes = $discount->price_excluding_taxes * (1 + ($originalPrice->vat_rate / 100));
                break;
        }

        /*
         * l'objet qui est return
         */
        $currentPricing = new stdClass;
        $currentPricing->id = null;
        $currentPricing->price_including_taxes = round($discount->price_including_taxes);
        $currentPricing->price_excluding_taxes = round($discount->price_excluding_taxes);
        $currentPricing->vat_value = $discount->vat_value;
        $currentPricing->vat_rate = $originalPrice->vat_rate;


        return ['current_pricing' => $currentPricing, 'current_discount' => $discount->makeHidden('vat_value', 'price_excluding_taxes', 'price_including_taxes')];
    }

    /*
     * check si le produit a un ou plusieurs discount apllicable, applique automatiquement un discount et applique un code promo si le code existe
     */
    public function checkDiscount(Collection $discountCollection, string $code = null)
    {
        /*
           * dans le cas ou un seul discount existe
           */
        if(count($discountCollection) === 1){

            if ($discountCollection->contains('promotional_code', '!=', null)){
                if ($code != null) {
                    $discount = $discountCollection->where('promotional_code_id', $code)->first();
                    if (empty($discount)) {
                        $discount = $discountCollection->where('promotional_code_id', null)->first();
                    }
                }
                else {
                    return null;
                }
            }
            else{
                $discount = $discountCollection->first();
            }
        }
        /*
         * dans le cas où il un discount est un promo code existant
         */
        if ($code != null) {
            $discount = $discountCollection->where('promotional_code_id', $code)->first();
            if (empty($discount)) {
                $discount = $discountCollection->where('promotional_code_id', null)->first();
            }
        } else {
            $discount = $discountCollection->first();
        }

        return $discount;
    }

    /*
     * Getters
     */
    public function getCategoryDiscount()
    {
        if ($this->categories()->exists()) {
            return $this->categories()->first()->discount;
        }
        return null;
    }

    public function getDiscounts()
    {
        if ($this->discounts()->where('start_at','<=', Carbon::now())->exists()) {
            return $this->discounts()
                ->where('start_at', '<=', Carbon::now())
                ->where('end_at', '>', Carbon::now())
                ->get();
        }
        return null;
    }

    /*
     * Relations
     */
    public function compositeProducts(): belongsToMany
    {
        return $this->belongsToMany('App\CompositeProduct', 'composite_products_products')->wherePivotNull('deleted_at');
    }

    public function availabilities(): hasOne
    {
        return $this->hasOne('App\ProductAvailability');
    }

    public function productCategories(): hasOne
    {
        return $this->hasOne('App\ProductCategory');
    }

    public function productDiscount(): HasMany
    {
        return $this->hasMany('App\ProductDiscount');
    }

    public function price(): hasOne
    {
        return $this->hasOne('App\ProductPrice');
    }

    public function discounts(): belongsToMany
    {
        return $this->belongsToMany('App\Discount', 'products_discounts')->wherePivotNull('deleted_at');
    }

    public function categories(): belongsToMany
    {
        return $this->belongsToMany('App\Category', 'products_categories')->wherePivotNull('deleted_at');
    }

    public function translationsList(): HasMany
    {
        return $this->hasMany('App\ProductTranslation');
    }

    public function compositeProductProduct(): HasMany
    {
        return $this->hasMany('App\CompositeProductProduct');
    }

    public function delete(): ?bool
    {
        $this->translationsList()->delete();
        $this->availabilities()->delete();
        $this->price()->delete();
        $this->productCategories()->delete();
        $this->productDiscount()->delete();
        $this->compositeProductProduct()->delete();

        return parent::delete();
    }
}
