<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @method static where(string $string, mixed $composite_product_id)
 */
class CompositeProductDiscount extends Model
{
    use SoftDeletes;

    protected $connection = 'data';
    protected $table = 'composite_products_discounts';
    protected $dates = ['created_at, updated_at, deleted_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

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
    protected $hidden = [];

    public function compositeProduct(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\CompositeProduct');
    }

    public function discount(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Discount');
    }
}
