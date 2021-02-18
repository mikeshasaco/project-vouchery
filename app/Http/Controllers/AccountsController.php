<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use DB;
use Session;
use Image;
use App\User;
use App\Product;
use App\Subsctipeion;
use Hash;
use Carbon\Carbon;
use App\Click;
use App\Advertisement;
use App\Mail\AdReceipt;
use App\Customer;
use App\Monthlyearning;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerSubscriptionRequest;
use App\Http\Requests\BankRequest;
use Illuminate\Support\Facades\Storage;

class AccountsController extends Controller
{
    public function index($slug)
    {
        User::where('slug',$slug)->firstOrFail();
        // if(!User::where('slug',$slug)->exists())
        // {
        //  return redirect()->route('notfound');
        // }
        $user = User::join('accounts', 'accounts.user_id', 'users.id')
        ->select('users.*', 'accounts.accountinfo', 'accounts.websitelink')
        ->where('slug', $slug)->first();

        $userproduct = User::join('accounts', 'accounts.user_id', 'users.id')
        ->join('products', 'products.user_id', 'users.id')
        ->join('categoriess', 'categoriess.id', 'products.category_id')
        ->select('products.*', 'users.company', 'categoriess.categoryname', 'users.slug', 'categoriess.catslug', 'users.stripe_plan')
        ->orderBy('products.created_at', 'DESC')
       ->where('slug', $slug)
       ->get();
        $user_auth = Auth::user();

    if(Auth::user()){

        foreach($userproduct as $product){
            if($product->user_id == $user_auth->id){
                $product->coupon = true;
            }else{
                if(!$product->exclusive){
                    $product->coupon = true;
                }else{
                    if($product->stripe_plan){
                        if($user_auth->subscribedByPlan('main', $product->stripe_plan)){
                            $product->coupon = true;
                        }
                        else{
                        $product->coupon = false;
                        }
                    }
                }
            }
        }
     }

        // $customer = $customer = Auth::guard('customer')->user();
        // if($user_auth){
        //     foreach($userproduct as $product){
        //         if($product->user_id == $user_auth->id){
        //             $product->coupon = true;
        //         }else{
        //         $product->coupon = false;
        //         }
        //     }
        // }
        // elseif($customer){
        //     foreach($userproduct as $product){
        //         if(!$product->exclusive){
        //             $product->coupon = true;
        //         }else{
        //             if($product->stripe_plan){
        //                 if($customer->subscribedByPlan('main', $product->stripe_plan)){
        //                     $product->coupon = true;
        //                 }
        //                 else{
        //                 $product->coupon = false;
        //                 }
        //             }
        //         }
        //     }
        // }
       $followercount = User::join('followables', 'users.id', 'followables.followable_id')
                    ->where('slug', $slug)->count();

       // $followers = User::join('followables', 'users.id', 'followables.followable_id')
       //              ->select('followables.customer_id', 'users.*')
       //              ->where('slug',$slug)
       //              ->get();
        return view('account.index')
        ->with('followercount', $followercount)
        ->with('user', $user)
        ->with('userproduct', $userproduct)
        ->with('usernotexist', $slug);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'accountinfo' => 'max:200',
            'avatar' => 'mimes:png,jpg,jpeg,gif|max:10000',

        ]);
        $array = Auth::user()->account()->update([
            'accountinfo' => $request->accountinfo,
            'websitelink' => $request->websitelink,
        ]);

        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $filename = 'avatarimage/' . time(). '.' . $avatar->getClientOriginalExtension();
            $o = Image::make($avatar)->orientate();
            $path = Storage::disk('do')->put('Avatar/' . $filename, $o->encode());
            
            if($path){
                $user = Auth::user();
                $oldfilename = $user->avatar;

                $oldfileexist = Storage::disk('do')->exists('Avatar/' .$oldfilename);

                if($oldfilename != 'company.png' && $oldfileexist){
                    Storage::disk('do')->delete('Avatar/' . $oldfilename);
                }
                $user->avatar = $filename;
                $user->update();
            }
        }
        Session::flash('UpdateAccountMe', 'Profile updated.');
        return redirect('/account/'. Auth::user()->slug);
    }

    public function destroy($slug, $id)
    {
        $deleteproduct = Product::find($id);
        // $oldcouponimage = $deleteproduct->image;
        // $oldcouponexist = Storage::disk('do')->exists('Coupon/' . $oldcouponimage);
        // if($oldcouponimage == $oldcouponexist){
        //     Storage::disk('do')->delete('Coupon/' . $oldcouponimage);
        // }
        $deleteproduct->delete();
        Session::flash('DeleteCoupon', 'Coupon Has Been Deleted!');
        return back();
    }

    public function store($slug, $id, Request $request)
    {
        $this->validate($request, [
            'adname' => 'required',
            'adprice' => 'required|in: 4.99'
        ]);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;

        $charge = \Stripe\Charge::create([
                'amount' => 499,
                'currency' => 'usd',
                'description' => 'purchasing ad',
                "source" => $token,

            ]);

        $adbool = Product::find($id);
        $adbool->advertboolean = 1;
        $adbool->update();
        $advertisement =new Advertisement;
        $advertisement->adname = $request->adname;
        $advertisement->adprice = $request->adprice;
        $advertisement->prod_id = $request->prod_id;
        $advertisement->us_id = Auth::user()->id;
        $advertisement->save();

        Mail::send(new AdReceipt($advertisement));
        Session::flash('advertisement-running', 'Success: Advertisement Running');
        return back();
    }

    public function adcart($slug)
    {
        // Rename from advertisement to setting
        // grabbing the user
        if (Auth::user()->slug == $slug) {
            $user = User::join('accounts', 'accounts.user_id', 'users.id')
            ->where('slug', $slug)->first();
            // this get all posts Running or Not Running
        //     $userproduct = User::join('accounts', 'accounts.user_id', 'users.id')
        //     ->join('products', 'products.user_id', 'users.id')
        //     ->join('categoriess', 'categoriess.id', 'products.category_id')
        //     ->select('products.*', 'users.company', 'categoriess.categoryname')
        //    ->where('slug', $slug)
        //    ->get();
            // total count of like coupon per coupon
            // $usertracker = Click::join('users', 'users.id', 'clicks.click_user_id')
            //                     ->join('products', 'products.id', 'clicks.click_product_id')
            //                     ->join('categoriess', 'categoriess.id', 'products.category_id')
            //                     ->select('clicks.click_product_id', DB::raw('count(*) as total'), 'products.title', 'products.advertboolean', 'categoriess.categoryname')
            //                     ->groupBY('clicks.click_product_id')
            //                     ->where('slug', $slug)
            //                     ->get();

            // $usertracker = Click::join('users', 'users.id', 'clicks.click_user_id')
            //                         ->join('products', 'products.id', 'clicks.click_product_id')
            //                         ->join('categoriess', 'categoriess.id', 'products.category_id')
            //                         ->select('clicks.click_customer_id', DB::raw('count(*)as total'))
            //                         ->groupBy('clicks.click_customer_id')
            //                         ->where('slug', $slug)
            //                         ->get();

            // $usertracker = Click::join('users', 'users.id', 'clicks.click_user_id')
            //                 ->distinct('clicks.click_customer_id')
            //                 ->select
            //                 ->where('slug', $slug)
            //                  ->count('clicks.click_customer_id');                               

            //     dd($usertracker);
            $userinfo = User::join('accounts', 'accounts.user_id', 'users.id')
                                ->select('users.*', 'accounts.accountinfo', 'accounts.websitelink')
                                ->where('slug', $slug)->first();
        } else {
            return redirect('/');
        }
        return view('account.adcart', compact('user', 'userinfo'));
    }

    public function advertise($slug)
    {

        if (Auth::user()->slug == $slug) {
            $user = User::join('accounts', 'accounts.user_id', 'users.id')
            ->where('slug', $slug)->first();

            $userproduct = User::join('accounts', 'accounts.user_id', 'users.id')
                ->join('products', 'products.user_id', 'users.id')
                ->join('categoriess', 'categoriess.id', 'products.category_id')
                ->select('products.*', 'users.company', 'categoriess.categoryname')
                ->where('slug', $slug)
                ->get();

        } else{
            return redirect('/');

        }
        return view('account.advertise', compact( 'userproduct', 'user'));
    }

    public function tracker($slug)
    {
        if (Auth::user()->slug == $slug) {
            $user = User::join('accounts', 'accounts.user_id', 'users.id')
                ->where('slug', $slug)->first();

            $usertracker = Click::join('users', 'users.id', 'clicks.click_product_user_id')
            ->join('products', 'products.id', 'clicks.click_product_id')
            ->join('categoriess', 'categoriess.id', 'products.category_id')
            ->select('clicks.click_product_id', DB::raw('count(*) as total'), 'products.title', 'products.advertboolean', 'categoriess.categoryname')
            ->groupBY('clicks.click_product_id')
            ->where('slug', $slug)
                ->get();

        }else{
            return redirect('/');

        }

                return view('account.tracker', compact('usertracker', 'user'));
    }
    
    public function changepassword(Request $request)
    {
        // this checks if the current password matches with the retry aptemp password
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches;
            //Error Current PAss + New PAss
            Session::flash('error-password', "Your Current Password does not match with the password you provided. Please try again.");
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        //this check if the string strcmp is equal to the new password if so produce an error
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same;
            Session::flash('error-password', "Your New Password can not be the same as your current password. Please choose a different password.");
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        if ($request->get('new-password') != $request->get('new-password_confirmation')) {
            // Error New PAssword  + password Confirmation
            Session::flash('error-password', "Your New Password does not match up with your password confirmation. Please try again.");
            return redirect()->back()->with("error", "Your New Password does not match your password confirmation. Please try typing password again.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|alpha_num|confirmed',
            ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        Session::flash('success-changepassword', "Password Updated");
        return redirect()->back();
    }

    public function follow(User $user, $slug){
        $user = User::where('slug', $slug)->first();
        $merchant = Auth::user();
        // $customer = Auth::guard('customer')->user();
        $merchant->follow($user);
        return redirect()->back()->with('success', 'You are now following user');

    }

    public function unfollow(User $user, $slug){
        $user = User::where('slug', $slug)->first();

        $merchant = Auth::user();
        $merchant->unfollow($user);
        return redirect()->back()->with('success', 'You have unfollowed merchant');

    }

    // as merchant
    // subscription setting page
    public function setsubscription($slug)
    {
        if (Auth::user()->slug == $slug) {

        $user = User::join('accounts', 'accounts.user_id', 'users.id')
            ->where('slug', $slug)->first();
        } else {
            return redirect('/');

        }
        return view('account.subscription', compact('user'));
    }

    // subscription setting
    public function subscriptionsetting(BankRequest $request){
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = Auth::user();
        if($user->subscription_price && $user->stripe_plan){
            $user->bank_accountname = $request->bankName;
            $user->bank_routingnumber = $request->beneficiarySwiftCode;
            $user->bank_accountnumber = $request->ibanAccountNo;
            $user->save();
            Session::flash('successmessage', 'Your bank has been changed successfully');
            return redirect()->back()->with('success', 'Your bank has been changed successfully');
        }
        $product = \Stripe\Product::create([
            'name' => $user->company,
            'type' => 'service'
        ]);
        $plan = \Stripe\Plan::create([
            'amount' => $request->subscription_price*100,
            'currency' => 'usd',
            'interval' => 'month',
            'product' => $product->id,
               ]);
        $user->subscription_price = $request->subscription_price;
        $user->stripe_plan = $plan->id;
        $user->bank_accountname = $request->bankName;
        $user->bank_routingnumber = $request->beneficiarySwiftCode;
        $user->bank_accountnumber = $request->ibanAccountNo;
        $user->save();
        Session::flash('successmessage', 'You have set subscription');
        return redirect()->back()->with('success', 'You have set subscription');
    }

    // subscription statistic 
    public function subscriptionstatistic($slug)
    {

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = Auth::user();

        if ($user->stripe_id == null) {
            $customer_subscriptions = [];
        } else {
            $customer_subscriptions = \Stripe\Subscription::all(['customer' => $user->stripe_id, 'status' => 'active'])->data;
            foreach ($customer_subscriptions as $subscription) {
                $merchant = User::where('stripe_plan', $subscription->plan->id)->first();
                $subscription->company = $merchant->company;
                $subscription->slug = $merchant->slug;
                if ($user->subscriptionByPlan('main', $subscription->plan->id)->cancelled()) {
                    $subscription->end_date = date('m/d/Y', strtotime($user->subscriptionByPlan('main', $subscription->plan->id)->ends_at));
                }
            }
        }


        $subscriptions = \Stripe\Subscription::all(['plan' => $user->stripe_plan, 'status' => 'active'])->data;
        // so if not the current user
        if (!$user->stripe_plan || $subscriptions == []) {
            $subscription_customer = [];
        } else {
            foreach ($subscriptions as $subscription) {
                $subscription_customer[] = $subscription->customer;
            }
        }
        // dd($subscriptions);
        // $monthlyBalance 
        $firstofmonth = Carbon::now()->firstOfMonth()->addMonth(1)->format(' d F, Y');
        $customers = User::whereIn('stripe_id', $subscription_customer)->get();

        $user->count = count($customers);
        // dd($customers);

        $monthlyearnings = Monthlyearning::where('user_id',$user->id)->get();
        return view('account.subscriptionstatistic',  compact('user','customers','firstofmonth','monthlyearnings','customer_subscriptions'));
    }

    //as customer
    // subscribe to merchant
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
        $customer = Auth::user();
        $customer->newSubscription('main', $user->stripe_plan)->create($token->id);
        Session::flash('successmessage', 'You have set subscription to '.$user->company);
        return redirect()->back();        
    }

    // cancel subscribe
    public function subscribecancel($slug) {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $user = User::where('slug', $slug)->first();
        $customer = Auth::user();

        $subscription = $customer->subscriptionByPlan('main', $user->stripe_plan);

        if ($subscription->cancelled()) {
            $end_date = date('d/m/Y', strtotime($subscription->ends_at));
            return redirect()->back()->with('success', 'You already have canceled subscription of '.$user->company.'. It will cancel at '.$end_date);  
        }
        $subscription->cancel();
        return redirect()->back()->with('success', 'You have canceled subscription of '.$user->company); 
    }

    // subscription coupons...
    public function subscriptioncoupons($slug){

        if (Auth::user()->slug == $slug) {

        
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $customer = Auth::user();
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
        foreach($products as $product){
            if($product->user_id == $user->id){
                $product->coupon = true;
            }else{
                if(!$product->exclusive){
                    $product->coupon = true;
                }else{
                    if($product->stripe_plan){
                        if($user->subscribedByPlan('main', $product->stripe_plan)){
                            $product->coupon = true;
                        }
                        else{
                        $product->coupon = false;
                        }
                    }
                }
            }
        }
        // $customer = $customer = Auth::guard('customer')->user();
        // if($user){
        //     foreach($products as $product){
        //         if($product->user_id == $user->id){
        //             $product->coupon = true;
        //         }else{
        //         $product->coupon = false;
        //         }
        //     }
        // }
        // elseif($customer){
        //     foreach($products as $product){
        //         if(!$product->exclusive){
        //             $product->coupon = true;
        //         }else{
        //             if($product->stripe_plan){
        //                 if($customer->subscribedByPlan('main', $product->stripe_plan)){
        //                     $product->coupon = true;
        //                 }
        //                 else{
        //                 $product->coupon = false;
        //                 }
        //             }
        //         }
        //     }
        // }

        }
        else{
            return redirect('/');

        }
        return view('customer.subscriptioncoupons', compact('customer','products'));
    }

    public function followactivity($slug)
    {
        if (Auth::user()->slug == $slug) {

        $user =  User::where('slug', $slug)->firstOrFail();


        $merchantfollowing = $user->followings;

        // $merchantthatfollowingme = User::join('followables', 'users.id', 'followables.followable_id')
        //                                         ->join('products', 'products.id', 'products.user_id')
        //                                         ->where('slug', $slug)->with('followings')->get();

        // $merchantthatfollowingme = User::where('slug', $slug)->with('followings')->with('products')->get();

        // dd($merchantthatfollowingme);

        //  dd($merchantfollowing);
        // $user->followings()->count();
        $merchantcount = $user->followings()->count();

        $merchantfollowers = $user->followers;

        $merchantcountfollowers = $user->followers()->count();
        } else{
            return redirect('/');

        }


    return view('account.activity', compact('merchantfollowing', 'merchantcount', 'merchantfollowers', 'merchantcountfollowers'));
        
    }

    public function notifications($slug)
    {
        if (Auth::user()->slug == $slug) {


        $user =  User::where('slug', $slug)->firstOrFail();
        // $user = Auth::user();


        // followers and following
        $merchantfollowing = $user->followings;

        $merchantcount = $user->followings()->count();

        $merchantfollowers = $user->followers;

        $merchantcountfollowers = $user->followers()->count();

        // customer subscriptions

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        if ($user->stripe_id == null) {
            $customer_subscriptions = [];
        } else {
            $customer_subscriptions = \Stripe\Subscription::all(['customer' => $user->stripe_id, 'status' => 'active'])->data;
            foreach ($customer_subscriptions as $subscription) {
                $merchant = User::where('stripe_plan', $subscription->plan->id)->first();
                $subscription->company = $merchant->company;
                $subscription->slug = $merchant->slug;
                if ($user->subscriptionByPlan('main', $subscription->plan->id)->cancelled()) {
                    $subscription->end_date = date('m/d/Y', strtotime($user->subscriptionByPlan('main', $subscription->plan->id)->ends_at));
                }
            }
        }


        $subscriptions = \Stripe\Subscription::all(['plan' => $user->stripe_plan, 'status' => 'active'])->data;
        if (!$user->stripe_plan || $subscriptions == []) {
            $subscription_customer = [];
        } else {
            foreach ($subscriptions as $subscription) {
                $subscription_customer[] = $subscription->customer;
            }
        }


        // current subscription

        $user->count = count($subscriptions);
        $firstofmonth = Carbon::now()->firstOfMonth()->addMonth(1)->format(' d F, Y');

        $customers = User::whereIn('stripe_id', $subscription_customer)->get();
        // dd($customers);

    } else {
            return redirect('/');
    }

        

        return view('account.notifications', compact('merchantfollowing', 'merchantcount', 'merchantfollowers', 'merchantcountfollowers', 'customer_subscriptions', 'customers', 'user', 'firstofmonth'));

    }
}
