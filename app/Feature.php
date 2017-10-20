<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Feature extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'name','type','required','selections'
    ];

	protected static $rules = [
		'name' => 'required',
		'type' => 'required',
		'required' => 'required',
		'selections' => 'required'
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
