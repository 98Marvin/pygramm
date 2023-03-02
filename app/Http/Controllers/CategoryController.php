<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::latest()->paginate(2);
        $categories = DB::table('categories')
        ->join('users', 'categories.user_id', 'users.id')
        //specifying which data to collect from the tables
        ->select('categories.*', 'users.name')
        ->latest()->paginate(3);

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
