<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        return view('admin.category.index');
    }
   
    public function store (Request $request) {
        $request->validate([
            'name' => 'unique:categories|max:255|required',
        ],
        [
            'name.required' => 'Please enter Category Name',
            'name.max' => 'Category Name is more than 255 characters'
        ]   
    
    );

        

        // return view('admin.category.index');
    }
}
