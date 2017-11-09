<?php

namespace App;

use Countries;
use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class City extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'country_id', 'name'
    ];

    protected static $rules = [
        'country_id' => 'required|integer',
        'nameAr'     => 'required|string|max:255',
        'nameEn'     => 'required|string|max:255'
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


    public function country()
    {
        return Countries::whereId($this->country_id)->first();
    }
}
