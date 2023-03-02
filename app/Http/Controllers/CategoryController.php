<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(2);
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'unique:categories|max:255|required',
            ],
            [
                'name.required' => 'Please enter Category Name',
                'name.max' => 'Category Name is more than 255 characters',
            ],
        );

        Category::insert([
            'name' => $request->name,
            'user_id'=>auth()->user()->id,
            'created_at'=>Carbon::now()
        ]);

        return back()->with('success', 'Category Created Successfully....!!!');
    }
}
