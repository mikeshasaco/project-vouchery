<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Account;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\Captcha;

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

        Account::create(['user_id' => $user->id]);
        dd($user);
        
        return $user;
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
