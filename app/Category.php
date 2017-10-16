<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Category extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'name'
    ];

	public static $rules = array(
		'name' => 'required'
	);

    public $detailsMethods = [];

	
}
