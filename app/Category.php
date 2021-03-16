<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @method static select(string $string)
 * @method static where(string $string, mixed $category_id)
 */
class Category extends Model
{
    use SoftDeletes, Translatable;

    protected $connection = 'data';
    protected $table = 'categories';
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

    public function translationsList(): HasMany
    {
        return $this->hasMany('App\CategoryTranslation');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany('App\Product', 'products_categories')->wherePivotNull('deleted_at');
    }

    public function compositeProducts(): belongsToMany
    {
        return $this->belongsToMany('App\CompositeProduct', 'composite_products_categories')->wherePivotNull('deleted_at');

    }

    public function discounts(): belongsToMany
    {
        return $this->belongsToMany('App\Discount', 'categories_discounts')->wherePivotNull('deleted_at');

    }
}
