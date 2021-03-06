<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Account;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\Rules\Captcha;
use App\VerifyUser;
use Mail;
use App\Mail\VerifyUserMail;
use Illuminate\Http\Request;
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
    // protected $redirectTo = return '/account/'. Auth::user()->slug;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:30|unique:users|unique:customers,email',
            'password' => 'required|string|min:6|alpha_num|confirmed',
            'company' => 'required|string|max:16|unique:users,company|not_in:customers,voucheryhub,account,accounts,admin,user,User,Admin,Customer,Customers,Voucheryhub,VOUCHERYHUB, Accounts,Account,name,Name,Email,email, ADMIN,USER| alpha_num',
            'g-captcha-response' => new Captcha(),

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $avatarpath = 'company.png';

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'company' =>$data['company'],
            'password' => Hash::make($data['password']),
            'slug' => str_slug($data['company']),
            'avatar' => $avatarpath,

        ]);


        DB::table('followables')->insert(
            array(
                'followable_id' => 1,
                'user_id' => $user->id,
                'followable_type' => 'App\User',
                'relation' => 'follow',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null
            )
        );


        Account::create(['user_id' => $user->id]);
            
        return $user;
    }

//     protected function registered(Request $request, $user)
//     {
//         $this->guard()->logout();
//         return redirect('/login')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
// }

    protected function redirectto(){
        // return '/account/'. auth()->user()->slug;

        return '/welcome/voucheryhub';

    }


    public function showRegistrationForm()
    {
        if (Auth::user() || Auth::guard('customer')->user()) {
            return redirect('/');
        } else {
            return view('customer-auth.register');
        }
    }

}
