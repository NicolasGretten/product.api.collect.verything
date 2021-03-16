<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @method static select(string $string)
 * @method static where(string $string, mixed $discount_id)
 * @property false|mixed|string id
 * @property mixed discount_type
 * @property mixed amount
 * @property mixed start_at
 * @property mixed end_at
 * @property mixed promotional_code
 */
class Discount extends Model
{
    use SoftDeletes, Translatable;

    protected $connection = 'data';
    protected $table = 'discounts';
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

    public function translationsList(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\DiscountTranslation');
    }

    public function promotionalCodes(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo('App\PromotionalCode', 'promotional_code_id');
    }

    public function compositeProducts(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\CompositeProduct', 'composite_products_discounts')->wherePivotNull('deleted_at');
    }

    public function products(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\Product', 'products_discounts')->wherePivotNull('deleted_at');
    }

    public function categories(): \Illuminate\Database\Eloquent\Relations\belongsToMany
    {
        return $this->belongsToMany('App\Category', 'categories_discounts')->wherePivotNull('deleted_at');
    }
}
