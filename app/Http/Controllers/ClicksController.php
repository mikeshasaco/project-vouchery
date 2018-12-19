<?php

namespace App\Http\Controllers;

use App\Product;
use App\Click;
use Auth;

class ClicksController extends Controller
{
    public function postClicks($id)
    {
        // This works increments
        $product = Product::FindorFail($id);
        $product->increment('clicks');
        $product->update();



        // store the create in an array
        // tracks clicks that are customers
        if (Auth::guard('customer')->user()) {
            Click::create(['click_customer_id' => Auth::guard('customer')->user()->id,
                        'click_product_id' => $product->id,
                        'click_user_id' => $product->user_id,
    ]);
        }
        // tracks clicks that are guest
    //     elseif (!Auth::guard('customer')->user() && !Auth::user()) {
    //         Click::create(['click_customer_id' => null,
    //                     'click_product_id' => $product->id,
    //                     'click_user_id' => $product->user_id,
    // ]);
    //     }
        else {
        }
        // this is from the product table and clicks section
    }
}
