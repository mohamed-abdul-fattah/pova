<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'phone'
    ];

    public static $rules = [
        'phone' => 'required'
    ];

    public function phoneable()
	{
		return $this->morphTo();
	}
}
