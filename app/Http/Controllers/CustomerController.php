<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Auth;
use Hash;
use App\User;
use App\Click;
use Session;

class CustomerController extends Controller
{
    public function index($customerslug)
    {
        if (Auth::guard('customer')->user()->customerslug == $customerslug) {
            $customer = Customer::where('customerslug', $customerslug)->first();


            $customerclicks = Click::join('customers', 'customers.id', 'clicks.click_customer_id')
                            ->join('products', 'products.id', 'clicks.click_product_id')
                            ->join('categoriess', 'categoriess.id', 'products.category_id')
                            ->join('users', 'users.id', 'products.user_id')
                            ->select('clicks.click_product_id', 'products.*', 'categoriess.categoryname', 'users.company', 'users.slug')
                            ->groupBy('clicks.click_product_id')
                            ->where('customerslug', $customerslug)
                            ->inRandomOrder()
                            ->take(10)
                            ->get();

            $customerfollowing = Customer::join('followables', 'customers.id', 'followables.customer_id')
                                ->join('users', 'users.id', 'followables.followable_id')
                                ->join('accounts', 'accounts.user_id', 'users.id')
                                ->select('users.company','followables.*', 'customers.customerslug', 'users.id', 'users.slug', 'accounts.websitelink')
                                ->where('customerslug', $customerslug)
                                ->get();

            $customersubcoupons =  Customer::join('followables', 'customers.id', 'followables.customer_id')
                                    ->join('users', 'users.id', 'followables.followable_id')
                                    ->join('products', 'users.id','products.user_id' )
                                    ->select('products.title', 'products.currentprice', 'products.newprice', 'users.company','products.url','users.slug','products.created_at')
                                    ->where('customerslug', $customerslug)
                                    ->orderBy('products.created_at', 'DESC')
                                    ->take(15)
                                    ->get();

            return view('customer.index', compact('customer', 'customerclicks','customerfollowing', 'customersubcoupons'));
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $customerslug)
    {
        //
        //
        // //get('current-password') this what you type
        // // get the current password not hashed compare it to the one in the database. check if pass match with database
        // if(!(Hash::check($request->get('current-password'), Auth::guard('customer')->user()->password))){
        //     return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        //     Session::flash('error-password', "Error when submitting password");
        // }
        // // checks if the current password match the new password if so throw error check if current pass match with new pass
        // if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        //     return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        //     Session::flash('error-password', "Error when submitting password");
        //
        // }

        if (!(Hash::check($request->get('current-password'), Auth::guard('customer')->user()->password))) {
            // The passwords matches;
            Session::flash('error-password', "Error Current PAss + Data PAss");
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        //this check if the string strcmp is equal to the new password if so produce an error
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same;
            Session::flash('error-password', "CurrentPass + New PAss same");
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        if ($request->get('new-password') != $request->get('new-password_confirmation')) {
            Session::flash('error-password', "Error New PAssword  + password Confirmation");
            return redirect()->back()->with("error", "Your New Password does not match your password confirmation. Please try typing password again.");
        }

        $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|alpha_num|confirmed'

        ]);

        $customer = Auth::guard('customer')->user();
        $customer->password = bcrypt($request->get('new-password'));
        $customer->save();

        Session::flash('customer-changepassword', 'Password Successfully Updated!');
        return redirect()->back();
    }

}
