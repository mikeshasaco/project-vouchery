<?php

namespace App\Http\Controllers;

use Image;
use App\Submission;

use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    public function create()
    {
        return view('admin.submission.create');
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

        $submission = new Submission;
        $submission->title = $request->title;
        $submission->description = $request->description;
        $submission->current = $request->current;
        $submission->new = $request->new;
        $submission->discountcode = $request->discountcode;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/adsubmissions/' . $filename);
            Image::make($image)->save($location);
            $submission->image = $filename;
        }


        $submission->save();

        

        return redirect('/admin');
    }
}
