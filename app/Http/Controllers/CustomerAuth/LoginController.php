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

    public function guard()
    {
        return Auth::guard('customer');
    }

    public function logoutcustomer(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
   public function authenticated(Request $request, $customer)
    {
        if (!$customer->verified) {
            $this->guard()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
    }

    return redirect()->intended($this->redirectPath());
}


    public function showLoginForm()
    {
        if (Auth::user() || Auth::guard('customer')->user()) {
            return redirect('/');
        } else {
            return view('customer-auth.login');
        }
    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            return $this->sendLoginResponse($request);

            return redirect()->intended('/');
       }

        //    return back()->withInput($request->only('email', 'remember'));
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
   }
 
}
