<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'lat',
        'lng',
        'address'
    ];

    public static $rules = [
        'lat' => 'required|numeric',
        'lng' => 'required|numeric',
        'address' => 'required|string'
    ];

    public function addressable()
	{
		return $this->morphTo();
	}
}
