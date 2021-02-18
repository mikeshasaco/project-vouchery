<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::join('categoriess', 'categoriess.id', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->orderByRaw('advertboolean = 0', 'advertboolean')
            ->orderBy('products.created_at', 'DESC')
            ->where('categoryname', 'like', "%$query%")
            ->orwhere('title', 'like', "%$query%")
            ->orwhere('company', 'like', "%$query%")
            ->paginate(15);
            dd($products);
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
        return view('search.searchresult')->with('products', $products);
    }
}
