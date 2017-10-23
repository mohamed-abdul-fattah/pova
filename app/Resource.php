<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Resource extends Model
{
    use HydrogenTrait;

    protected $fillable = [
        'category_id', 'user_id', 'title', 'feature'
    ];

	protected static $rules = [
		'category_id' => 'required',
		'user_id' => 'required',
		'title' => 'required',
		'feature' => 'required'
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

	
	public function category()
	{
		return $this->belongsTo('App\Category'); 
	}

	public function user()
	{
		return $this->belongsTo('App\User'); 
	}

}
