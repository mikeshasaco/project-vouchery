<?php

namespace App\Http\Controllers;

use App\Product;
use App\Click;
use App\Customer;
use Auth;


class ClicksController extends Controller
{
    public function postClicks($id)
    {
 
            // find product
            $product = Product::FindorFail($id);

            // check to see if in database

            // $clicks_registered = Click::where('click_customer_id', '=', Auth::guard('customer')->user()->id)
            //                     ->where('click_product_id', '=', $product->id)
            //                     ->first();


            // This works increments
            $product->increment('clicks');
            $product->update();
            Click::create([
            'click_auth_user_id' => Auth::user()->id,
                'click_product_id' => $product->id,
            'click_product_user_id' => $product->user_id,
            ]);

           

            // store the create in an array
        // tracks clicks that are customers
        // if(Auth::guard('customer')->user() && is_null($clicks_registered)) {
        //         // This works increments
        //         $product->increment('clicks');
        //         $product->update();
        //         Click::create([
        //             'click_customer_id' => Auth::guard('customer')->user()->id,
        //             'click_product_id' => $product->id,
        //             'click_user_id' => $product->user_id,
        //         ]);
        //     }
  
        // tracks clicks that are guest
    //     elseif (!Auth::guard('customer')->user() && !Auth::user()) {
    //         Click::create(['click_customer_id' => null,
    //                     'click_product_id' => $product->id,
    //                     'click_user_id' => $product->user_id,
    // ]);
    //     }
     
        // this is from the product table and clicks section
    }
}
