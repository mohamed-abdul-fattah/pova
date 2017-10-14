<?php

namespace App;

use Auth;
use Spatie\Permission\Traits\HasRoles;
use BaklySystems\Hydrogen\HydrogenTrait;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles, HydrogenTrait, Impersonate;

    public $detailsMethods = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name'  => 'required|string|max:255',
        'email' => 'email|string|max:255'
    ];


    public function superCan($ability,$model=null){
        if (Auth::user()->hasRole('Super Admin')) {
            return true;
        } else {
        if ($model) {
            $ability = $ability . '_' . str_plural(strtolower(last(explode("\\", class_basename($model)))));
        }
            return $this->getAllPermissions()->pluck('name')->contains($ability);
        }
    }

    public function phones()
    {
        return $this->morphMany('App\Phone', 'phoneable');
    }

    public function address()
    {
        return $this->morphOne('App\Address', 'addressable');
    }
}
