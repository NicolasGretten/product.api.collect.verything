<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use stdClass;


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
    public $translatedAttributes = ['text'];


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

    protected $appends = ['original_pricing'];

    public function getOriginalPricingAttribute()
    {
        if ($this->price()->exists()) {
            return $this->price()->first()->makeHidden('product_id', 'deleted_at', 'created_at', 'updated_at');
        }
        return null;
    }

    public function price(): hasOne
    {
        return $this->hasOne('App\Models\ProductPrice');
    }

    public function categories(): belongsToMany
    {
        return $this->belongsTo('App\Models\Category')->wherePivotNull('deleted_at');
    }

    public function translationsList(): HasMany
    {
        return $this->hasMany('App\Models\ProductTranslation');
    }

    public function delete(): ?bool
    {
        $this->translationsList()->delete();
        $this->price()->delete();

        return parent::delete();
    }
}
