<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
//use Tymon\JWTAuth\Exceptions\JWTException;
//use Tymon\JWTAuth\Exceptions\TokenExpiredException;
//use Tymon\JWTAuth\Exceptions\TokenInvalidException;
//use Tymon\JWTAuth\Facades\JWTAuth;
//use Tymon\JWTAuth\Providers\JWTAuthServiceProvider;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/back';
    protected $redirectAfterLogout = '/back/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function getLogin()
    {
        return view('backend.auth.login');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


//    public function getLogin() {
//        return view('backend.auth.login');
//    }
//
//    public function authenticate(Request $request)
//    {
//        $credentials = $request->only('email', 'password');
//
//        try {
//            // verify the credentials and create a token for the user
//            if (!$token = JWTAuth::attempt($credentials)) {
//                return response()->json(['error' => 'invalid_credentials'], 401);
//            }
//
//        } catch (JWTException $e) {
//            // something went wrong
//            return response()->json(['error' => 'could_not_create_token'], 500);
//        }
//
//        // if no errors are encountered we can return a JWT
//        //return response()->json(compact('token'));
//        return redirect('back')->header('Authorization', 'Bearer ' . JWTAuth::getToken());
//    }
//
//    public function logout(Request $request) {
//
//        $this->validate($request, [
//            'token' => 'required'
//        ]);
//
//        JWTAuth::invalidate($request->input('token'));
//    }


}
