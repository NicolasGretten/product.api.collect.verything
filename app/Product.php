<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
    protected $hidden = ['pivot','translations'];

    public function compositeProducts(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\CompositeProduct', 'composite_products_products')->wherePivotNull('deleted_at');
    }

    public function availabilities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\ProductAvailability');
    }

    public function productCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\ProductCategory');
    }

    public function prices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\ProductPrice');
    }

    public function discounts(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\Discount', 'products_discounts')->wherePivotNull('deleted_at');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\Category', 'products_categories')->wherePivotNull('deleted_at');
    }

    public function translationsList(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\ProductTranslation');
    }

    public function delete(): ?bool
    {
        $this->translationsList()->delete();
        $this->availabilities()->delete();
        $this->prices()->delete();
        $this->productCategories()->delete();

        return parent::delete();
    }
}
