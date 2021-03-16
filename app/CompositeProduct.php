<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
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

    public function translationsList(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\CompositeProductTranslation');

    }

    public function prices(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\CompositeProductPrice');
    }

    public function availabilities(): \Illuminate\Database\Eloquent\Relations\HasMany
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
}
