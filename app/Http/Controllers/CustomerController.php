<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerSubscriptionRequest;
use App\Customer;
use App\Subsctipeion;
use Auth;
use Hash;
use App\User;
use App\Click;
use App\Product;
use Session;

class CustomerController extends Controller
{
    public function index($customerslug)
    {
        if (Auth::guard('customer')->user()->customerslug == $customerslug) {
            $customer = Customer::where('customerslug', $customerslug)->first();
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
            if($customer->stripe_id==null){
                $subscriptions = [];
            }else{
                $subscriptions = \Stripe\Subscription::all(['customer'=>$customer->stripe_id,'status'=>'active'])->data;
                foreach($subscriptions as $subscription){
                    if($customer->subscriptionByPlan('main', $subscription->plan->id)->cancelled()){
                        $subscription->end_date = date('d/m/Y', strtotime($customer->subscriptionByPlan('main',$subscription->plan->id)->ends_at));
                    }
                }
            }
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

            return view('customer.index', compact('customer', 'customerclicks','customerfollowing', 'customersubcoupons','subscriptions'));
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

    public function subscribe(CustomerSubscriptionRequest $request, $slug) {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = User::where('slug', $slug)->first();
        if($user->stripe_plan == null){
            Session::flash('successmessage', $user->company.' did not set subscription yet');
            return redirect()->back()->with('success', $user->company.' did not set subscription yet');  
        }
        $token = \Stripe\Token::create([
                "card" => [
                   "number"    => $request->card_number,
                   "exp_month" => $request->exp_month,
                   "exp_year"  => $request->exp_year,
                   "cvc"       => $request->cv_code,
                   "name"      => $request->card_name
                ]
            ]
        );
        $customer = Auth::guard('customer')->user();
        $customer->newSubscription('main', $user->stripe_plan)->create($token->id);
        Session::flash('successmessage', 'You have set subscription to '.$user->company);
        return redirect()->back();        
    }

    public function subscribecancel($slug) {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = User::where('slug', $slug)->first();
        $customer = Auth::guard('customer')->user();

        $subscription = $customer->subscriptionByPlan('main', $user->stripe_plan);

        if ($subscription->cancelled()) {
            $end_date = date('d/m/Y', strtotime($subscription->ends_at));
            return redirect()->back()->with('success', 'You already have canceled subscription of '.$user->company.'. It will cancel at '.$end_date);  
        }
        $subscription->cancel();
        return redirect()->back()->with('success', 'You have canceled subscription of '.$user->company); 
    }

    public function subscriptioncoupons($customersulg){
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $customer = Auth::guard('customer')->user();
        $subscriptions = \Stripe\Subscription::all(['customer'=>$customer->stripe_id,'status'=>'active'])->data;
        if(!$customer->stripe_id||$subscriptions==[]){
            $subscriptions_plan = [];
        }else{
            foreach($subscriptions as $subscription){
                $subscriptions_plan[] = $subscription->plan->id;
            }
            
        }
        $products = Product::join('categoriess', 'categoriess.id', 'products.category_id')
        ->join('users', 'users.id', 'products.user_id')
        ->select('products.*', 'users.company', 'users.slug', 'categoriess.categoryname'
        , 'categoriess.catslug','users.stripe_plan')
        ->orderByRaw('advertboolean = 0', 'advertboolean')
        ->orderBy('products.created_at', 'DESC')
        ->whereIn('users.stripe_plan', $subscriptions_plan)
        ->where('products.exclusive', "on")
        ->paginate(15);
        $user = Auth::user();
        $customer = $customer = Auth::guard('customer')->user();
        if($user){
            foreach($products as $product){
                if($product->user_id == $user->id){
                    $product->coupon = true;
                }else{
                $product->coupon = false;
                }
            }
        }
        elseif($customer){
            foreach($products as $product){
                if(!$product->exclusive){
                    $product->coupon = true;
                }else{
                    if($product->stripe_plan){
                        if($customer->subscribedByPlan('main', $product->stripe_plan)){
                            $product->coupon = true;
                        }
                        else{
                        $product->coupon = false;
                        }
                    }
                }
            }
        }
        return view('customer.subscriptioncoupons', compact('customer','products'));
    }
}
