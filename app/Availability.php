<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Availability extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'resource_id', 'start', 'end', 'type'
    ];

    protected static $rules = [
        'resource_id' => 'required|integer',
        'start'       => 'required|date',
        'end'         => 'required|date',
        'type'        => 'required|string|max:255|in:unavailable,seasonal'
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
     * Get parent resource.
     */
    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    /**
     * Get seasonal price.
     */
    public function seasonalPrice()
    {
        return $this->hasOne('App\Price');
    }
}
