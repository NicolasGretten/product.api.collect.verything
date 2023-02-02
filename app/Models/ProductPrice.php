<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @property false|mixed|string product_id
 * @property mixed price_including_taxes
 * @property mixed price_excluding_taxes
 * @property mixed vat_value
 * @property mixed vat_rate
 * @property false|mixed|string id
 * @method static where(string $string, mixed $building_id)
 */
class ProductPrice extends Model
{
    use SoftDeletes;

    protected $connection = 'data';
    protected $table = 'products_prices';
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

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Product');
    }
}
