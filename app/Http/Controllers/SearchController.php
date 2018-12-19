<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::join('categoriess', 'categoriess.id', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->orderByRaw('advertboolean = 0', 'advertboolean')
            ->orderBy('products.created_at', 'DESC')
            ->where('categoryname', 'like', "%$query%")
            ->orwhere('title', 'like', "%$query%")
            ->orwhere('company', 'like', "%$query%")
            ->paginate(30);

        return view('search.searchresult')->with('products', $products);
    }
}
