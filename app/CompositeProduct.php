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
 * @method static where(string $string, mixed $composite_product_id)
 */
class CompositeProduct extends Model
{
    use SoftDeletes, Translatable;

    protected $connection = 'data';
    protected $table = 'composite_products';
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
    protected $hidden = ['pivot','translations'];

    protected $appends = ['current_pricing', 'current_discount', 'original_pricing', 'discount'];

    protected ?string $code = null;

    /*
    * Variable
    */
    public function code(string $code = null)
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



    /*
     * Gestion des discount et des prix
     * applique le discount et return le prix actuel avec le discount appliqué et le discount
     */
    public function applyDiscount(string $code = null)
    {

        $originalPrice = $this->getOriginalPricingAttribute();

        /*
         * le discount sur le produit passe en priorité
         */
        if ($this->getDiscounts() != null) {
            $discount = $this->checkDiscount($this->getDiscounts(), $code);
            if ($discount === false){
                return $originalPrice;
            }
        }
        /*
         * si aucun discount sur le produit existe on ckeck si un discount sur la category existe
         */
        elseif ($this->getCategoryDiscount() != null) {
            $discount = $this->checkDiscount($this->getCategoryDiscount(), $code);
            if ($discount === false){
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
                    return false;
                }
            }
            else{

                $discount = $discountCollection->first();
            }
        }
        /*
         * dans le cas où il un discount et un promo code existant
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
        if ($this->discounts()->exists()) {
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
    public function products(): belongsToMany
    {
        return $this->belongsToMany('App\Product', 'composite_products_products')->wherePivotNull('deleted_at');
    }

    public function compositeProductCategory(): HasMany
    {
        return $this->hasMany('App\compositeProductCategory');
    }
    public function compositeProductAvailability(): HasMany
    {
        return $this->hasMany('App\compositeProductAvailability');
    }
    public function compositeProductDiscount(): HasMany
    {
        return $this->hasMany('App\compositeProductDiscount');
    }
    public function compositeProductPrice(): HasMany
    {
        return $this->hasMany('App\compositeProductPrice');
    }
    public function compositeProductProduct(): HasMany
    {
        return $this->hasMany('App\compositeProductProduct');
    }

    public function translationsList(): HasMany
    {
        return $this->hasMany('App\CompositeProductTranslation');
    }

    public function price(): hasOne
    {
        return $this->hasOne('App\CompositeProductPrice');
    }

    public function availabilities(): HasMany
    {
        return $this->hasMany('App\CompositeProductAvailability');
    }

    public function discounts(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\Discount', 'composite_products_discounts')->wherePivotNull('deleted_at');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\Category', 'composite_products_categories')->wherePivotNull('deleted_at');
    }

    public function delete(): ?bool
    {
        $this->translationsList()->delete();
        $this->compositeProductCategory()->delete();
        $this->compositeProductAvailability()->delete();
        $this->compositeProductPrice()->delete();
        $this->compositeProductDiscount()->delete();
        $this->compositeProductProduct()->delete();

        return parent::delete();
    }
}
