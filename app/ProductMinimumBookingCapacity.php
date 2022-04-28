<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @property false|mixed|string product_id
 * @property false|mixed|string id
 * @method static where(string $string, mixed $building_id)
 */
class ProductMinimumBookingCapacity extends Model
{
    use SoftDeletes;

    protected $connection = 'data';
    protected $table = 'products_minimum_booking_capacity';
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

    public function product(): BelongsTo
    {
        return $this->belongsTo('App\Product');
    }
}
