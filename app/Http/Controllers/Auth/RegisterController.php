<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|string|max:255',
            'email'    => 'string|nullable|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type'     => 'required|string|max:255,in:user,admin,provider',
            'phone'    => 'required|numeric',
            'company'  => 'string|nullable',
            'entity'   => 'string|in:individual,company'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'type'     => $data['type'],
            'phone'    => $data['phone']
        ]);

        // Provider details.
        if ($data['type'] === 'provider') {
            $user->provider()->create([
                'entity'       => $data['entity'],
                'company_name' => $data['company']
            ]);
        }

        return $user;
    }

    /**
     * Show registeration form page (not used).
     *
     * @param  array  $data
     * @return User
     */
    // public function showRegistrationForm()
    // {
    //     if (array_key_exists('domain', Route::getCurrentRoute()->action)) {
    //         if (str_contains(Route::getCurrentRoute()->action['domain'], env('ADMIN_PREFIX'))) {
    //             return view('auth.register');
    //         }
    //     } else {
    //         return view('layouts.frontend.register');
    //     }
    // }
}
