<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        $trash =  Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('categories', 'trash'));
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
            ]
        );

        Category::insert([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Category Created Successfully....!!!');
    }
    
    public function edit ($id) {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    
    public function update (Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request['name'],
            'user_id' => Auth::user()->id

        ]);

        return redirect()->route('categories')->with('success', 'Category Updated Successfully....!!!');
    }
    
    public function softDelete ($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return back()->with('success', 'Category Deleted Successfully....!!!');
    }
    
    public function restore ($id) {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        
        return back()->with('success', 'Category Restored Successfully....!!!');
    }
    
    public function delete ($id) {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();
        
        return back()->with('success', 'Category Permanently Deleted Successfully....!!!');
    }
}
