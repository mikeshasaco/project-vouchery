<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use DB;
use Session;
use Image;
use App\User;
use App\Product;
use Hash;
use App\Click;
use App\Advertisement;
use App\Mail\AdReceipt;
use App\Customer;
use Illuminate\Http\Request;
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

        $userproduct = user::join('accounts', 'accounts.user_id', 'users.id')
        ->join('products', 'products.user_id', 'users.id')
        ->join('categoriess', 'categoriess.id', 'products.category_id')
        ->select('products.*', 'users.company', 'categoriess.categoryname', 'users.slug')
        ->orderBy('products.created_at', 'DESC')
       ->where('slug', $slug)
       ->get();

       $followercount = User::join('followables', 'users.id', 'followables.followable_id')
                    ->where('slug', $slug)->count();
        // dd($followercount);

       // $followers = User::join('followables', 'users.id', 'followables.followable_id')
       //              ->select('followables.customer_id', 'users.*')
       //              ->where('slug',$slug)
       //              ->get();
       //  dd($followers);

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
            'avatar' => 'mimes:png,jpg,jpeg,gif|max:10000|required',

        ]);

        $array = Auth::user()->account()->update([
            'accountinfo' => $request->accountinfo,
            'websitelink' => $request->websitelink,
        ]);

        if ($request->hasFile('avatar')) {

            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            $o = Image::make($avatar)->orientate();
            $path = Storage::disk('do')->put('Avatar/' . $filename, $o->encode());
            
            if($path){
                $user = Auth::user();
                $oldfilename = $user->avatar;

                $oldfileexist = Storage::disk('do')->exists('Avatar/' .$oldfilename);

                dd($oldfileexist);
                // if($oldfilename != 'company.png' && $oldfileexist){
                //     Storage::disk('do')->delete($oldfilename);
                // }
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
        $deleteproduct->delete();

        Session::flash('DeleteCoupon', 'Coupon Has Been Deleted!');
        return back();
    }

    public function store($slug, $id, Request $request)
    {
        $this->validate($request, [
            'adname' => 'required',
            'adprice' => 'required|in: 2.99'
        ]);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;


        $charge = \Stripe\Charge::create([
                'amount' => 299,
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
            $userproduct = User::join('accounts', 'accounts.user_id', 'users.id')
            ->join('products', 'products.user_id', 'users.id')
            ->join('categoriess', 'categoriess.id', 'products.category_id')
            ->select('products.*', 'users.company', 'categoriess.categoryname')
           ->where('slug', $slug)
           ->get();


            // total count of like coupon per coupon
            $usertracker = Click::join('users', 'users.id', 'clicks.click_user_id')
                                ->join('products', 'products.id', 'clicks.click_product_id')
                                ->join('categoriess', 'categoriess.id', 'products.category_id')
                                ->select('clicks.click_product_id', DB::raw('count(*) as total'), 'products.title', 'products.advertboolean', 'categoriess.categoryname')
                                ->groupBY('clicks.click_product_id')
                                ->where('slug', $slug)
                                ->get();

            $userinfo = User::join('accounts', 'accounts.user_id', 'users.id')
                                ->select('users.*', 'accounts.accountinfo', 'accounts.websitelink')
                                ->where('slug', $slug)->first();
        } elseif (Auth::guard('customer')->user()) {
            return redirect('/');
        } else {
            return redirect('/');
        }



        return view('account.adcart', compact('user', 'userproduct', 'submissonAds', 'usertracker', 'userinfo'));
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

        $customer = Auth::guard('customer')->user();
        $customer->follow($user);
        return redirect()->back()->with('success', 'You are now following user');

    }

    public function unfollow(User $user, $slug){
        $merchant = User::where('slug', $slug)->first();

        $customer = Auth::guard('customer')->user();
        $customer->unfollow($merchant);
        return redirect()->back()->with('success', 'You have unfollowed merchant');

    }


}
