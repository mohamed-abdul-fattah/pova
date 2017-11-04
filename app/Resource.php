<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Resource extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'category_id', 'user_id', 'title', 'feature'
    ];

    protected static $rules = [
        'category_id' => 'required|integer',
        'user_id'     => 'required|integer',
        'titleEn'     => 'required|string|max:255',
        'titleAr'     => 'required|string|max:255',
        'feature'     => 'boolean',
        'price'       => 'required|numeric',
        'unit_id'     => 'required|integer',
        'country_id'  => 'required|integer',
        'city_id'     => 'requried|integer',
        'lat'         => 'required|numeric',
        'lng'         => 'required|numeric',
        'address'     => 'requried|string|max:255'
    ];

    /**
     * Rules getter.
     */
    public static function rules()
    {
        return self::$rules;
    }

    /**
     * Relationships to be displayed in resource show page.
     */
    public $detailsMethods = [];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    /**
     * Get base price for a resource.
     */
    public function basePrice()
    {
        return $this->hasMany('App\Price')->where('availability_id', 0);
    }
}
