<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'categoryname' => 'required|unique:categoriess|max:255',
        'catslug' => 'required',


      ]);

        $category = new Category;
        $category->categoryname = $request->categoryname;
        $category->catslug = $request->catslug;
        $category->save();

        return redirect('/admin/category/create');
    }
}
