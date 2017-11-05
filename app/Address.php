<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'lat',
        'lng',
        'address',
        'country_id',
        'city_id'
    ];

    public static $rules = [
        'lat'        => 'required|numeric',
        'lng'        => 'required|numeric',
        'address'    => 'required|string',
        'country_id' => 'required|integer',
        'city_id'    => 'required|integer'
    ];

    public function addressable()
	{
		return $this->morphTo();
	}
}
