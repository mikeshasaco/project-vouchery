<?php

namespace App\Http\Controllers\CustomerAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    protected function guard()
    {
        return Auth()->guard('customer');
    }

    public function logoutcustomer()
    {
    // $customer =  Auth::guard('customer')->logout();
    //     $customer->session()->invalidate();
    //     return redirect('/');

    $customer = Auth::guard('customer');
    $customer->remember_token = "";
    $customer->logout();
    }



    public function showLoginForm()
    {
        if (Auth::user() || Auth::guard('customer')->user()) {
            return redirect('/');
        } else {
            return view('customer-auth.login');
        }
    }
}
