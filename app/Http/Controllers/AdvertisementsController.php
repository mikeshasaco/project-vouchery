<?php

namespace App\Http\Controllers;

use App\User;
use App\Submission;
use Session;
use Image;
use Auth;
use App\Mail\OrderReceipt;
use Illuminate\Http\Request;
use Mail;

class AdvertisementsController extends Controller
{

    public function createAd()
    {
        return view('advertisement.createAd');
    }

    public function store(Request $request)
    {
        $formInput=$request->except('image');

        $this->validate($request, [
          'title'=> 'required|max:30',
          'description' => 'required|max:100',
          'new' => 'required|numeric|between:0.01,9999.99|min:0.00',
          'current' => 'required|numeric|between:0.01,9999.99|min:0.00',
          'image' =>'image|mimes:png,jpg,jpeg|max:10000',
          'couponcode' => 'max:15',

        ]);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->stripeToken;


        $charge = \Stripe\Charge::create([
                'amount' => 1999,
                'currency' => 'usd',
                'description' => 'purchasing ad',
                "source" => $token,

            ]);

        $submission = new Submission;
        $submission->title = $request->title;
        $submission->description = $request->description;
        $submission->current = $request->current;
        $submission->new = $request->new;
        $submission->submissionprice = $request->submissionprice;
        $submission->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/adsubmissions/' . $filename);
            Image::make($image)->save($location);
            $submission->image = $filename;
        }
        $submission->save();

        Mail::send(new OrderReceipt($submission));

        Session::flash('advertisement-message', 'Success: Advertisement Running');
        return redirect('/');
    }
}
