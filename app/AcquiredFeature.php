<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class AcquiredFeature extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'feature_id', 'featureable', 'value_string', 'value_number', 'value_boolean', 'value_text'
    ];

	protected static $rules = [
		'feature_id' => 'required',
		'featureable' => 'required',
		'value_string' => 'required',
		'value_number' => 'required',
		'value_boolean' => 'required',
		'value_text' => 'required'
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

	
	public function feature()
	{
		return $this->belongsTo('App\Feature'); 
	}

}
