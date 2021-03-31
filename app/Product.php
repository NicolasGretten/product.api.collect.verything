<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;


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

    protected $appends = ['current_pricing', 'current_discount', 'original_pricing', 'discount','discount_category'];

    protected ?string $code = null;

    public function getDiscountCategoryAttribute()
    {
        return $this->categories()->first()->discount;
    }

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


    // applique le discount et return le prix actuel avec le discount appliqué et le discount
    public function applyDiscount(String $code = null)
    {
        if ($this->getDiscounts() != null) {
            $originalPrice = $this->getOriginalPricingAttribute();
            if ($code != null)
            {
                $discount = $this->getDiscounts()->where('promotional_code_id', $code)->first();
                if (empty($discount)) {
                    $discount = $this->getDiscounts()->where('promotional_code_id', null)->first();
                }
            }
            else{
                $discount = $this->getDiscounts()->where('promotional_code_id', null)->first();
            }

                switch ($discount->discount_type) {
                    case "monetary":

                        $discount->price_excluding_taxes = $originalPrice->price_excluding_taxes - $discount->amount;
                        $discount->vat_value = $discount->price_excluding_taxes * ($originalPrice->vat_rate/100);

                        $discount->price_including_taxes = $discount->price_excluding_taxes * (1 + ($originalPrice->vat_rate/100));
                        break;
                    case "percentage":

                        $discount->price_excluding_taxes = $originalPrice->price_excluding_taxes - (($discount->amount / 100) * $originalPrice->price_excluding_taxes);
                        $discount->vat_value = $discount->price_excluding_taxes * ($originalPrice->vat_rate/100);

                        $discount->price_including_taxes = $discount->price_excluding_taxes * (1 + ($originalPrice->vat_rate/100));
                        break;
                }

            $currentPricing = new \stdClass;
            $currentPricing->id = null;
            $currentPricing->price_including_taxes = round($discount->price_including_taxes);
            $currentPricing->price_excluding_taxes = round($discount->price_excluding_taxes);
            $currentPricing->vat_value = $discount->vat_value;
            $currentPricing->vat_rate = $originalPrice->vat_rate;

            return ['current_pricing' => $currentPricing, 'current_discount' => $discount->makeHidden('vat_value', 'price_excluding_taxes','price_including_taxes')];
        }

        return $this->getOriginalPricingAttribute();
    }

    public function getOriginalPricingAttribute()
    {
        return $this->price()->first()->makeHidden('product_id', 'deleted_at', 'created_at', 'updated_at');

    }

    public function getDiscounts()
    {
        if ($this->discounts()->exists()) {
            return $this->discounts()
                ->where('start_at','<=', Carbon::now())
                ->where('end_at','>', Carbon::now())
                ->get();
        }
        return null;
    }

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
        return $this->hasMany('App\compositeProductProduct');
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

    public function code(string $code = null)
    {
        $this->code = $code;
        return $this;
    }
}
