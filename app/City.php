<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class City extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'country_id', 'name'
    ];

	protected static $rules = [
		'country_id' => 'required',
		'name' => 'required'
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
		return $this->belongsTo('App\Country'); 
	}

}
