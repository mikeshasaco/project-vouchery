<?php

namespace App\Http\Controllers;

use App\User;
use App\Advertisement;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function Instantadcount(Request $request)
    {
        $search = $request->input('search');

        $instantad =
         Advertisement::join('products', 'products.id', 'Advertisements.prod_id')
         ->join('users', 'users.id', 'Advertisements.us_id')
        ->select('users.name', 'Advertisements.adprice', 'products.title', 'users.company')
        ->where('name', 'like', "%$search%")
        ->orwhere('title', 'like', "%$search%")
        ->orwhere('company', 'like', "%$search%")
        ->orwhere('adprice', 'like', "%$search%")
        ->paginate(30);

        return view('admin.instantad', compact('instantad'));
    }

    public function adminusers()
    {
        $adminallusers = User::all();

        return view('admin.users', compact('adminallusers'));
    }

    public function userdestroy($id)
    {
        $userdelete = User::join('accounts', 'accounts.user_id', 'users.id')->where('users.id', $id);

        $userdelete->delete();

        return back();
    }
}
