<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @property ProductPrice|mixed product_id
 * @property mixed day
 * @property mixed hour_start
 * @property mixed hour_end
 * @property false|mixed|string id
 * @method static where(string $string, mixed $building_id)
 */
class ProductAvailability extends Model
{
    use SoftDeletes;

    protected $connection = 'data';
    protected $table = 'products_availabilities';
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
    /**
     * @var ProductPrice|mixed
     */

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Product');
    }
}
