<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Type
 */
class PromotionalCodeTranslation extends Model
{
    use SoftDeletes;

    protected $connection = 'data';
    protected $table = 'promotional_codes_translations';
    protected $dates = ['created_at, updated_at, deleted_at'];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $translationForeignKey = ['promotional_code_id', 'locale'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function promotionalCode(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\PromotionalCode');
    }

    public function translationsList(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\PromotionalCodeTranslation');
    }

    public function delete(): ?bool
    {
        $this->translationsList()->delete();

        return parent::delete();
    }
}
