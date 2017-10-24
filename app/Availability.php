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
		'resource_id' => 'required',
		'start' => 'required',
		'end' => 'required',
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

	
	public function resource()
	{
		return $this->belongsTo('App\Resource'); 
	}

}
