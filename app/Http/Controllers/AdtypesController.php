<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adtype;
use Illuminate\Support\Facades\Redirect;
class AdtypesController extends Controller
{
    public function create()
    {
        return view('admin.ads.createtype');
    }

    public function store(Request $request)
    {
        $adtype = new Adtype;
        $adtype->name = $request->name;

        $adtype->save();

        return Redirect::back();
    }
}
