<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Customer;
use Illuminate\Support\Facades\DB;
use Auth; 
use Carbon\Carbon;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Rules\Captcha;
use Mail;
use Illuminate\Http\Request;
use App\VerifyCustomer;
use App\Mail\VerifyCustomerMail;

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
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    protected function guard()
    {
        return Auth()->guard('customer');
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
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:30|unique:customers|unique:users,email',
            'password' => 'required|string|min:6|alpha_num|confirmed',
            'username' => 'required|string|max:20|not_in:customers,voucheryhub,account,accounts,admin,user,User,Admin,Customer,Customers,Voucheryhub,VOUCHERYHUB, Accounts,Account,name,Name,Email,email
            |unique:customers|alpha_num',
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
        $customer = Customer::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'customerslug' => str_slug($data['username']),
        ]);

        DB::table('followables')->insert(
            array(
                'followable_id' => 1,
                'customer_id' => $customer->id,
                'followable_type' => 'App\User',
                'relation' => 'follow',
                'deleted_at' => null,
                'created_at' => Carbon::now(),
                'updated_at' => null
            ));

          
        
        return $customer;
    }

    protected function redirectto()
    {
        return '/customer/' . Auth()->guard('customer')->user()->customerslug;
    }

}
