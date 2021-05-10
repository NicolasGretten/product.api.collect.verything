<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 * @method static select(string $string)
 * @method static where(string $string, mixed $discount_id)
 */
class PromotionalCode extends Model
{
    use SoftDeletes, Translatable;

    protected $connection = 'data';
    protected $table = 'promotional_codes';
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
        return $this->hasMany('App\PromotionalCodeTranslation');
    }

    public function discounts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Discount');
    }

    public function checkUsage()
    {
        if ($this->maximum_usage == $this->number_used){
            $this->delete();
        }
    }

    public function delete(): ?bool
    {
        $this->translationsList()->delete();

        return parent::delete();
    }
}
