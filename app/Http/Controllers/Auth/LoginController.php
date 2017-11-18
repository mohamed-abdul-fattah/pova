<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'loginEmail';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string|email',
            'loginPassword'   => 'required|string',
        ]);
    }

    /**
     * Show login form, for admin dashboard and frontend.
     *
     * @return Response
     */
    public function showLoginForm()
    {
        if (array_key_exists('domain', Route::getCurrentRoute()->action)) {
            if (str_contains(Route::getCurrentRoute()->action['domain'], env('ADMIN_PREFIX'))) {
                return view('auth.login');
            }
        } else {
            return view('frontend.auth.login');
        }
    }

    /**
     * Show provider registration form.
     *
     * @return Response
     */
    public function showProviderForm()
    {
        return view('frontend.auth.provider-signup');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->loginPassword];
    }
}
