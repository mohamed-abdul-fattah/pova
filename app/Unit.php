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
		'nameAr' => 'required|string|max:255',
		'nameEn' => 'required|string|max:255',
		'type' => 'required|string|max:255|in:day'
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
