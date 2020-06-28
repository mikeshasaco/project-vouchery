<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\Advertisement;
use Illuminate\Http\Request;
use App\Customer;

class AdminsController extends Controller
{
    public function index()
    {
        $adminallcustomers = Customer::paginate(15);
        $adminallusers = User::paginate(15);
        $adminusercount = User::count();
        $admincustomercount = Customer::count();
        $adminproductcount = Product::count();
        return view('admin.index', compact('adminallusers', 'adminusercount', 'admincustomercount', 'adminproductcount', 'adminallcustomers'));
    }

    public function Instantadcount(Request $request)
    {
        $search = $request->input('search');

        $instantad =
         Advertisement::join('products', 'products.id', 'Advertisements.prod_id')
         ->join('users', 'users.id', 'Advertisements.us_id')
        ->select('users.name', 'Advertisements.adprice', 'products.title', 'users.company')
        ->where('name', 'like', "%$search%")
        ->orwhere('title', 'like', "%$search%")
        ->orwhere('company', 'like', "%$search%")
        ->orwhere('adprice', 'like', "%$search%")
        ->paginate(15);

        return view('admin.instantad', compact('instantad'));
    }

    public function adminusers(Request $request)
    {
        $query = $request->input('Msearch');

        $adminallusers = User::where('name', 'like', "%$query%")
                             ->orwhere('company', 'like', "%$query%")
                             ->paginate(15);

        return view('admin.users', compact('adminallusers'));
    }

    public function userdestroy($id)
    {
        $userdelete = User::join('accounts', 'accounts.user_id', 'users.id')->where('users.id', $id);

        $userdelete->delete();

        return back();
    }

    public function productdestroy($id){
        $productdelete = Product::find($id);
        $productdelete->delete();
        return back();
    }

    public function adminproducts(){

        $adminallproducts = Product::all();

        return view('admin.productsall', compact('adminallproducts'));
    }

    public function admincustomers(Request $request){
        $customerquery = $request->input('Qsearch');

        $customersonadmin = Customer::where('name', 'like', "%$customerquery%")
                            ->orwhere('username', 'like', "%$customerquery%")
                            ->paginate(15);
            return view('admin.customers', compact('customersonadmin')); 

    }
    
    public function customerdestroy($id){
        $customerdelete = Customer::find($id);
        $customerdelete->delete();
        return back();
    }
    public function subscriptionpayout(Request $request){
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $userquery = $request->input('Qsearch');

        $users = User::where('name', 'like', "%$userquery%")
                            ->orwhere('company', 'like', "%$userquery%")
                            ->paginate(15);
        foreach($users as $user){
            if(!$user->stripe_plan){
                $user->count = null;
            }else{
                $subscriptions = \Stripe\Subscription::all(['plan'=>$user->stripe_plan,'status'=>'active'])->data;
                $user->count = count($subscriptions);
            }
        }
        return view('admin.subscriptionpayout', compact('users'));
    }
}
