<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaklySystems\Hydrogen\HydrogenTrait;

class Category extends Model {
    use HydrogenTrait;

    protected $fillable = [
        'parent_id', 'name'
    ];

	protected static $rules = [
		'parent_id' => 'required|integer',
		'nameEn'    => 'required|string|max:255',
		'nameAr'    => 'required|string|max:255',
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
