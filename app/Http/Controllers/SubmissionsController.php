<?php

namespace App\Http\Controllers;

use Image;
use App\Submission;
use Illuminate\Support\Facades\Storage;
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
          'image' =>'image|mimes:png,jpg,jpeg|max:10000',
          'weblink' => 'required'

        ]);

        $submission = new Submission;
        $submission->weblink = $request->weblink;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
           $filename = time() . '.' . $image->getClientOriginalExtension();
      $o = Image::make($image)->orientate();
      $path = Storage::disk('do')->put('Banner/' . $filename, $o->encode());
      $submission->image = $filename;
          
        }


        $submission->save();

        

        return redirect('/admin');
    }
}
