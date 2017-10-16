<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Category extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'parent_id','name'
    ];

	public static $rules = array(
		'parent_id' => 'required',
		'name' => 'required'
	);

    public $detailsMethods = [];

	
	public function parent()
	{
		return $this->belongsTo('App\Parent'); 
	}

}
