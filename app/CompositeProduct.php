<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


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

    public function products(): \Illuminate\Database\Eloquent\Relations\belongsToMany
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

    public function prices(): hasOne
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
