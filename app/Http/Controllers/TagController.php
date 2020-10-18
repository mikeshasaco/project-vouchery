<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Tag;
class TagController extends Controller
{
    public function index()
    {
        return view('admin.ads.createtag');
    }
    

    public function store(Request $request)
    {

        $tag = new Tag;
        $tag->tagname = $request->tagname;
        $tag->save();

        return Redirect::back();
    }
}
