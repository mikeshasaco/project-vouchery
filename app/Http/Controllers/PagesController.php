<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Click;
use App\Submission;
use App\Category;
use App\Product;
use Carbon\Carbon;
use App\Advertisement;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $products = Product::join('categoriess', 'categoriess.id', 'products.category_id')
        ->join('users', 'users.id', 'products.user_id')
        ->select('products.id', 'products.user_id', 'products.title', 'products.desc', 'products.image', 'products.currentprice', 'products.newprice', 'products.category_id', 'products.couponcode', 'products.advertboolean', 'products.url', 'users.company', 'users.slug', 'products.clicks','products.exclusive', 'categoriess.categoryname', 'products.expired_date', 'products.created_at', 'categoriess.catslug','users.stripe_plan')
        ->orderByRaw('advertboolean = 0', 'advertboolean')
        ->orderBy('products.created_at', 'DESC')
        ->paginate(36);
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
        $submission = Submission::inRandomOrder()->take(4)->get();

        $productlower = Product::join('categoriess', 'categoriess.id', 'products.category_id')
                      ->join('users', 'users.id', '=', 'products.user_id')
                      ->where('newprice', '<', '300')
                      ->inRandomOrder()
                    ->take(2)
                     ->get();
        // $time = carbon::now()->addDays(7);
        // dd($time);



        // $dtime = carbon::now('EST');
        // $convert = $dtime->isoFormat('dddd');
        // dd($convert);
        // dd($dtime);
        // dd($productlower);

        // $recommendeditems = Recommends::join('users', 'users.slug', 'recommends.recommendaccount')
        //                     ->select('recommendaccount', 'company', DB::raw('count(*) as total'))
        //                     ->groupBy('recommendaccount', 'company')
        //                     ->orderBy('total', 'DESC')
        //                     ->inRandomOrder(2)
        //                     ->get();
        // Trending clicks - name latest weekly trends
        // $trendingclicks = Click::join('products', 'products.id', 'clicks.click_product_id' )
        //                     ->select('clicks.click_product_id', DB::raw('count(*) as totalcount'), 'products.*')
        //                     ->groupBy('click_product_id')
        //                     ->orderBy('totalcount', 'DESC')
        //                     ->get();

// dd($trendingclicks);
  

        $categoriess = Product::join('categoriess', 'categoriess.id', 'products.category_id')
        ->select('products.category_id', DB::raw('count(*) as total'),  'categoriess.categoryname', 'categoriess.catslug')
        ->groupBy('category_id')
        ->take(5)
        ->get();
        // $paidad = Advertisement::join('products', 'products.id', 'advertisements.prod_id')
        // ->join('categoriess', 'categoriess.id', 'products.category_id')
        // ->get();

        // dd($paidad);



        return view('pages.index', compact('products', 'submission', 'categoriess','customer'));
    }

    public function getData()
    {
        $productlower = Product::join('categoriess', 'categoriess.id', 'products.category_id')
                        ->join('users', 'users.id', '=', 'products.user_id')
                        ->inRandomOrder()
                        ->take(30)
                       ->get();
        $user = Auth::user();
        $customer = $customer = Auth::guard('customer')->user();
        if($user){
            foreach($productlower as $product){
                if($product->user_id == $user->id){
                    $product->coupon = true;
                }else{
                $product->coupon = false;
                }
            }
        }
        elseif($customer){
            foreach($productlower as $product){
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

        return $productlower;
    }



    public function filterData(Request $request)
    {
        $productlower = Product::join('categoriess', 'categoriess.id', 'products.category_id')
                        ->join('users', 'users.id', '=', 'products.user_id')
                        ->where(function ($query) use ($request) {
                            $query->where('newprice', '<', $request->max);
                            $query->where('newprice', '>', $request->min);
                        })
                        ->inRandomOrder()
                       ->get();
        $user = Auth::user();
        $customer = $customer = Auth::guard('customer')->user();
        if($user){
            foreach($productlower as $product){
                if($product->user_id == $user->id){
                    $product->coupon = true;
                }else{
                $product->coupon = false;
                }
            }
        }
        elseif($customer){
            foreach($productlower as $product){
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
        return $productlower;
    }
}
