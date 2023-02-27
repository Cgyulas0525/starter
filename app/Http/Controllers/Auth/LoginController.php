<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Providers\RouteServiceProvider;
use http\Env\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Events\LoginHistory;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

//    public function username()
//    {
//        return 'username';
//    }
//
//    public function myLogin(Request $request)
//    {
//        $request->validate([
//            'username' => 'required',
//            'password' => 'required',
//        ]);
//
//        $credentials = $request->only('username', 'password');
//        if (Auth::attempt($credentials)) {
//
//            return redirect()->route('partnerTypes.index');
//        }
//
//        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
//    }
}
