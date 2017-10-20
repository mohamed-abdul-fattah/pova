<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Feature extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'name', 'type', 'required', 'selections'
    ];

	protected static $rules = [
		'nameEn'     => 'required|string|max:255',
		'nameAr'     => 'required|string|max:255',
		'type'       => 'required|string|in:string,text,email,number,boolean,selection',
		'required'   => 'boolean',
		'selections' => 'max:400'
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
