<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Ad;
use App\Adtype;
use App\Category;
use App\Gender;
use Image;
use App\Tag;

class AdsController extends Controller
{
    public function create()
    {
        $adtype = Adtype::get();
        $categories = Category::get();
        $genders = Gender::get();
        $tags = Tag::get();

        return view('admin.ads.createad',compact('adtype','categories', 'genders','tags'));
    }

    public function store(Request $request)
    {
        $formInput = $request->except('image');

        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg,gif|max:10000|required',
        ]);


        $ad = new Ad;
        $ad->primarytext = $request->primary;
        $ad->secondarytext = $request->secondary;
        $ad->companyname = $request->company;
        $ad->adtype_id = $request->adtype;
        $ad->category_id = $request->category;
        $ad->gender_id = $request->gender;


         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $filename = time() . '.' . $image->getClientOriginalExtension();
             $location = public_path('/images/' . $filename);
             Image::make($image)->save($location);
             $ad->image = $filename;
         }

        $ad->save();

         $ad->tags()->sync($request->tags, false);
        return redirect::back();

    }

    public function index()
    {
        $advertisements = Ad::join('categoriess', 'categoriess.id', '=', 'ads.category_id')
                         ->join('adtypes', 'adtypes.id', 'ads.adtype_id')
                         ->join('genders', 'genders.id', 'ads.gender_id')
                         ->join('ad_tag', 'ad_tag.ad_id', 'ads.id')
                         ->select('tag_id', 'ads.*')
                         ->groupBy('ad_id')
                         ->get();


        // $ads = Ad::get();
        // dd($advertisements);
        
        return view('advertisement.index',compact('advertisements'));
    }
}
