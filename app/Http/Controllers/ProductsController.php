<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use Image;
use App\Category;
use App\User;
use App\Rules\PriceRule;
use Carbon\Carbon;
use App\Advertisement;
use Session;



class ProductsController extends Controller
{
    public function allbusinesses()
    {

        $products = Product::join('categoriess', 'categoriess.id', 'products.category_id')
            ->join('users', 'users.id', 'products.user_id')
            ->select('products.*', 'users.company', 'categoriess.categoryname', 'users.slug')
            ->orderByRaw('advertboolean = 0', 'advertboolean')
            ->orderBy('products.created_at', 'DESC')
            ->paginate(36);
        // this function responds to datatable
        $users = User::selectRaw('users.*, COUNT(products.id) AS products')
         ->join('products', 'users.id', '=', 'products.user_id')
         ->join('accounts', 'accounts.user_id', 'users.id')
         ->groupBy('users.id')
         ->paginate();

        $alladproducts = Advertisement::join('products', 'products.id', 'advertisements.prod_id')
                          ->join('users', 'users.id', 'products.user_id')
                          ->join('categoriess', 'categoriess.id', 'products.category_id')
                          ->select('products.*', 'users.company', 'categoriess.categoryname', 'users.slug')
                          ->inRandomOrder()
                          ->take(3)
                          ->get();

        $categorycountallbusy = Product::join('categoriess', 'categoriess.id', 'products.category_id')
      ->select('categoriess.*', 'products.category_id')
      ->get();


        return view('product.allbusinesses')
      ->with('categorycountallbusy', $categorycountallbusy)
      ->with('users', $users)
      ->with('products', $products)
      ->with('alladproducts', $alladproducts);

        // return view('product.allbusinesses',compact(  'users', 'products', 'alladproducts'));
    }

    public function catbusiness(Request $request, $slug)
    {
        // return category name in the url
        //getting the slug from the database to use in the url


        $users = User::selectRaw('users.*, COUNT(products.id) AS products')
            ->join('products', 'users.id', 'products.user_id')
            ->join('categoriess', 'categoriess.id', 'products.category_id')
             ->where('categoriess.catslug', '=', $slug)
            ->groupBy('users.id')
            ->get();

        $products = Product::join('categoriess', 'categoriess.id', 'products.category_id')
        ->join('users', 'users.id', '=', 'products.user_id')
        ->select('products.*', 'users.company', 'categoriess.categoryname', 'users.slug')
        ->orderByRaw('advertboolean = 0', 'advertboolean')
        ->orderBy('products.created_at', 'DESC')
        ->where('categoriess.catslug', $slug)
        ->paginate(36);
        // random products for the category that between 10 - 100 dollars
        $randomcat = Product::join('categoriess', 'categoriess.id', 'products.category_id')
                ->join('users', 'users.id', '=', 'products.user_id')
                ->where('categoriess.catslug', $slug)
                ->where('newprice', '<', '1000')
                ->inRandomOrder()
                ->take(3)
                ->get();


        $paidadvertisement = Advertisement::join('products', 'products.id', 'advertisements.prod_id')
                        ->join('users', 'users.id', 'products.user_id')
                        ->join('categoriess', 'categoriess.id', 'products.category_id')
                        ->select('products.*', 'users.company', 'categoriess.categoryname', 'users.slug')
                        ->where('categoriess.catslug', $slug)
                        ->inRandomOrder()
                        ->take(3)
                        ->get();

        // if(!Category::where('catslug',$slug)->exists())
        // {
        //     return redirect()->route('notfound');
        // }
        Category::where('catslug', $slug)->firstOrFail();
        $catbread = Category::where('catslug', $slug)->first();
        $cats =  Category::orderBy('categoryname','ASC')->get();

        session()->put('categoryname', $catbread->catslug);

        $categorycount = Product::join('categoriess', 'categoriess.id', 'products.category_id')
    ->select('categoriess.*', 'products.category_id')
    ->where('catslug', $slug)
    ->get();
        //dd($products);
        return view('product.catbusiness')
        ->with('cats', $cats)
        ->with('users', $users)
        ->with('categorycount', $categorycount)
        ->with('products', $products)
        ->with('catbyuser', $slug)
        ->with('randomcat', $randomcat)
        ->with('catbread', $catbread)
        ->with('paidadvertisement', $paidadvertisement);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput=$request->except('image');

        $this->validate($request, [
        'title'=> 'required|max:30',
        'desc' => 'required|max:100',
        'newprice' => [
          'required', 'numeric', 'between:0.00,9999.99', 'min:0.00',
            new PriceRule($request->currentprice)
        ],
        'currentprice' => 'required|numeric|between:0.01,9999.99|min:0.00',
        'image' =>'image|mimes:png,jpg,jpeg,gif|max:10000|required',
        'couponcode' => 'max:20',
        "url" => 'required|url',

      ]);
        // limit the number of posts that a user can make which is set to 9
        if (Auth::user()->products()->get()->count() == 9) {
            session::flash('limit-count', 'You have reached the limit of coupons you can post!');
            return back();
        } else {
            $product = new Product;
        }
        $product->title = $request->title;
        $product->desc = $request->desc;
        $product->currentprice = $request->currentprice;
        $product->newprice = $request->newprice;
        $product->category_id = $request->category;
        $product->couponcode = $request->couponcode;
        $product->url = $request->url;
        $product->expired_date = Carbon::now()->addMinute(3);
        $product->user_id = Auth::user()->id;
//         $product->expired_date = Carbon::now()->addDay(7);

        if ( $request->hasFile('image')) {
            // $image = $request->file('image');
            // $filename = time() . '.' . $image->getClientOriginalExtension();
            // $location = public_path('/images/' . $filename);
            // Image::make($image)->orientate()->save($location);
            // $product->image = $filename;
        $extension = $request->file('image')->extension();
        $mimeType = $request->file('image')->getMimeType();
        $path = Storage::disk('do')->putFileAs('public/images', $request->file('image'), time(). '.'. $extension);
        Storage::disk('do')->setVisibility($path, 'public');
        $path->orientate();
        $product->image = $path;
        // Image::make($request->file('image'))->orientate()->save($path);

        }
        // using the storage

        //
        $saved = $product->save();
        Session::flash('successmessage', 'Coupon Created Successfully');
        return redirect('/account/'. Auth::user()->slug);

        // return redirect()->back();
    }


}
