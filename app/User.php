<?php

namespace App;

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
        'name', 'email','password', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static $rules = [
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|string|max:255',
        'password' => 'required|string|min:6',
        'type'     => 'required|string|max:255|in:admin,user,provider',
        'phone'    => 'required|numeric',
        'entity'   => 'string|in:individual,company'
    ];

    /**
     * Rules getter.
     */
    public static function rules()
    {
        return self::$rules;
    }

    public function superCan($ability, $model = null)
    {
        if (auth()->user()->hasRole('Super Admin')) {
            return true;
        } else {
            if ($model) {
                $ability = $ability . '_' . str_plural(strtolower(last(explode("\\", class_basename($model)))));
            }
            return $this->getAllPermissions()->pluck('name')->contains($ability);
        }
    }

    /**
     * Ger user phone.
     */
    public function phone()
    {
        return $this->morphOne('App\Phone', 'phoneable');
    }
}
