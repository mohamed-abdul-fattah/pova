<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Category extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'parent_id', 'name'
    ];

	public static $rules = array(
		'parent_id' => 'required|integer',
		'name'      => 'required|string|max:255'
	);

    public $detailsMethods = [];

	public function parent()
	{
        if ($this->parent_id) {
            return $this->belongsTo('App\Category', 'parent_id')
                ->first()
                ->name;
        } else {
            return 'Parent Category';
        }
	}

    public function parentObj()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

}
