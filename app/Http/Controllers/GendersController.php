<?php

namespace App\Http\Controllers;
use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class GendersController extends Controller
{
    public function create()
    {
        return view('admin.ads.creategender');
    }

    public function store(Request $request)
    {

        $gender = new Gender;
        $gender->role = $request->role;

        $gender->save();

        return Redirect::back();
    }
}
