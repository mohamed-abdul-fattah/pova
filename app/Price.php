<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Price extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'resource_id', 'unit_id', 'availability_id', 'price', 'currency'
    ];

	protected static $rules = [
		'resource_id' => 'required',
		'unit_id' => 'required',
		'availability_id' => 'required',
		'price' => 'required',
		'currency' => 'required'
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
