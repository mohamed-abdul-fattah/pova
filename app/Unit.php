<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Unit extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'name', 'type'
    ];

	protected static $rules = [
		'name' => 'required',
		'type' => 'required'
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

	
}
