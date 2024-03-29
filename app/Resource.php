<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Resource extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'category_id', 'user_id', 'title', 'featured'
    ];

    protected static $rules = [
        'category_id' => 'required|integer',
        'title'       => 'required|string|max:255',
        'featured'    => 'boolean',
        'price'       => 'required|numeric',
        'unit_id'     => 'integer',
        'country_id'  => 'required|integer',
        'city_id'     => 'required|integer',
        'lat'         => 'required|numeric',
        'lng'         => 'required|numeric',
        'address'     => 'required|string|max:255',
        'photos.*'    => 'image',
        'cover'       => 'image'
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

    /**
     * Get the category of a resource.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get the owner of a resource.
     */
    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the address of a resource.
     */
    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }

    /**
     * Get base price for a resource.
     */
    public function basePrice()
    {
        return $this->hasOne('App\Price')
            ->where('availability_id', 0)
            ->where('extra', 0);
    }

    /**
     * Get acquired featurers for a resource.
     */
    public function acquiredFeatures()
    {
        return $this->morphMany('App\AcquiredFeature', 'featureable');
    }

    /**
     * Get acquired prices for a resource.
     */
    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    /**
     * Get extra prices for a resource.
     */
    public function extras()
    {
        return $this->hasMany('App\Price')
            ->where('availability_id', 0)
            ->where('extra', 1);
    }

    /**
     * Get availabilities for a resource.
     */
    public function availabilities()
    {
        return $this->hasMany('App\Availability');
    }
}
