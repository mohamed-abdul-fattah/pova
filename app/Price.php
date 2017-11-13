<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Price extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'resource_id', 'unit_id', 'availability_id', 'price', 'currency', 'description', 'extra'
    ];

    protected static $rules = [
        'resource_id'     => 'required|integer',
        'unit_id'         => 'required|integer',
        'availability_id' => 'required|integer',
        'price'           => 'required|numeric',
        'currency'        => 'required|string:max:255',
        'extra'           => 'boolean'
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

    public function resource()
    {
        return $this->belongsTo('App\Resource');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function availability()
    {
        return $this->belongsTo('App\Availability');
    }
}
