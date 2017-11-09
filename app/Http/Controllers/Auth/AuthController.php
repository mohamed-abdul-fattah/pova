<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request as Request;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Auth;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exception\HttpResponseException;

class AuthController extends Controller
{
    //use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function authenticate(Request $request)
    {

        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 200);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 200);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */

    public function postLogin(Request $request)
    {
        try {
            $this->validatePostLoginRequest($request);
        } catch (HttpResponseException $e) {
            return $this->onBadRequest();
        }

        try {
            // Attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt(
                $this->getCredentials($request)
            )) {
                return $this->onUnauthorized();
            }
        } catch (JWTException $e) {
            // Something went wrong whilst attempting to encode the token
            return $this->onJwtGenerationError();
        }

        // All good so return the token
        return $this->onAuthorized($token);
    }

    /**
     * Validate authentication request.
     *
     * @param  Request $request
     * @return void
     * @throws HttpResponseException
     */
    protected function validatePostLoginRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
    }

    protected function validateCreateRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
            'name' => 'required',
            'type' => 'required',
            'type_id' => 'required',
        ]);
    }

    /**
     * What response should be returned on bad request.
     *
     * @return JsonResponse
     */
    protected function onBadRequest()
    {
        return new JsonResponse([
            'message' => 'invalid_credentials'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * What response should be returned on invalid credentials.
     *
     * @return JsonResponse
     */
    protected function onUnauthorized()
    {
        return new JsonResponse([
            'message' => 'invalid_credentials'
        ], Response::HTTP_UNAUTHORIZED);
    }

    /**
     * What response should be returned on error while generate JWT.
     *
     * @return JsonResponse
     */
    protected function onJwtGenerationError()
    {
        return new JsonResponse([
            'message' => 'could_not_create_token'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * What response should be returned on authorized.
     *
     * @return JsonResponse
     */
    protected function onAuthorized($token)
    {
        return new JsonResponse([
            'message' => 'token_generated',
            'data' => [
                'token' => $token,
            ]
        ]);
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    /**
     * Invalidate a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteInvalidate()
    {
        $token = JWTAuth::parseToken();

        $token->invalidate();

        return new JsonResponse(['message' => 'token_invalidated']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\Response
     */
    public function patchRefresh()
    {
        $token = JWTAuth::parseToken();

        $newToken = $token->refresh();

        return new JsonResponse([
            'message' => 'token_refreshed',
            'data' => [
                'token' => $newToken
            ]
        ]);
    }

    /**
     * Get authenticated user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        return new JsonResponse([
            'message' => 'authenticated_user',
            'data' => JWTAuth::parseToken()->authenticate()
        ]);
    }


    /************/
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'type_id' => $data['type_id'],
        ]);
      //  $user->assignRole('customer');
        return $user;
    }



    public function authenticateProvider(Request $request,$provider)
    {
        // grab credentials from the request
        $providerId=$provider."Id";

        // attempt to verify the credentials and create a token for the user
        if (!   $user=User::where($provider.'Id',$request->providerid)->whereNotNull($provider.'Id')->first()) {
            if(!$user=User::findByEmail($request->email)) {
                $user = new User;
                $user->name = $request->name ? $request->name : $request->providerid;
                $user->email = $request->email ? $request->email : $request->providerid . '@' . $provider . ".com";
                $user->$providerId = $request->providerid;
                $user->save();
                $user->assignRole('customer');
            }

        }

        $user->$providerId  = $request->providerid;
        $user->save();
        if(!$user->hasRole('customer')){
            $user->assignRole('customer');
        }
        try {

            if (! $token = JWTAuth::fromUser($user)) {
                return response()->json(['error' => 'invalid_credentials'], 200);
            }

        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 200);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $providerId=$provider."Id";
        $providerAvatar=$provider."_avatar";
        $providerUser = Socialite::driver($provider)->stateless()->user();
        // dd($providerUser);
        $user=User::where($provider.'Id',$providerUser->id)->whereNotNull($provider.'Id')->first();
        // dd($user);
        if(!$user){
            if(!$user=User::findByEmail($providerUser->email)) {

                $user = new User;
                $user->name = $providerUser->name;
                if ($providerUser->email) {
                    $user->email = $providerUser->email;
                } else {
                    $user->email = $providerUser->id . '@' . $provider . ".com";
                }
                if ($user->email == "@facebook.com") {
                    $user->email = date('Ymdhis') . '@facebook.com';
                }
            }
        }

        $user->$providerId  = $providerUser->id;
        if($provider=='facebook') {
            $user->$providerAvatar = $providerUser->avatar;
        }
        $user->save();

        if(!$user->hasRole('customer')){
            $user->assignRole('customer');
        }
        // $role               = Role::find(1);
        //$user->attachRole($role);

        Auth::login($user);
        //  Flash::success('successfully logged in with '.$provider);
        return redirect()->back();

    }

    public function apiRegister(Request $request)
    {
        /*try {
            $this->validateCreateRequest($request);
        } catch (HttpResponseException $e) {
            return $this->onBadRequest();
        }


        try {

            $user= $this->create($request->input());
        }catch(\Illuminate\Database\QueryException $e){
            return response()->json(["error"=>"Duplicate email"],200);
        }*/

        $user= $this->create(array_merge($request->input(),['userable_id'=>'0','userable_type'=>'0']));

        $token= JWTAuth::fromUser($user);
        return response()->json(compact('token'),200);
    }
}
