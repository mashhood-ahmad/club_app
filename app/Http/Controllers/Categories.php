<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class Categories extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("categories.index", compact("categories"));
    }

    public function create()
    {
        return view("categories.create");
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->min_age = $request->min_age;
        $category->max_age = $request->max_age;
        $category->save();

        Session::flash('success', 'Category created successfully.');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view("categories.edit", compact("category"));
    }

    public function update($id, CategoryRequest $request)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->min_age = $request->min_age;
        $category->max_age = $request->max_age;
        $category->save();

        Session::flash('success', 'Category updated successfully.');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        Session::flash('success', 'Category deleted successfully.');
        return redirect()->route('categories.index');
    }
}
