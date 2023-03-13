<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BrandController extends Controller
{
    public function index () {
        $brands = Brand::latest()->paginate(5);
        
        return view('admin.brand.index', compact('brands'));
    }

    public function store (Request $request) {
        $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],

            [
                'brand_name.required' => 'Please enter Brand Name',
                'image.required' => 'Please Choose an Image...!!',
                'image.mimes' => 'Extension not allowed...!!',
            ]);
            
            $image = $request->file('image');
            $name  = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());

            $image_name = $name.'.'.$img_ext;

            $upload = 'images/brand/';

            $last_img = $upload.$image_name;

            $image->move($upload, $image_name);

            Brand::insert([
                'brand_name' => $request->brand_name,
                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return back()->with('success', 'Brand Created Successfullly..');
        }
        
        public function edit ($id) {
            $brand = Brand::find($id);
            
            return view('admin.brand.edit', compact('brand'));
        }
        
        public function update (Request $request, $id) {
            $request->validate(
                [
                    'brand_name' => 'required|min:4',
                    'image' => 'mimes:jpg,jpeg,png',
                ],
                
                [
                    'brand_name.required' => 'Please enter Brand Name',
                ]);
                
                $old_image = $request->old_image;
                $image = $request->file('image');

                if ($image) {
                    
                $name  = hexdec(uniqid());
                $img_ext = strtolower($image->getClientOriginalExtension());
                
                $image_name = $name.'.'.$img_ext;
                
                $upload = 'images/brand/';
                
                $last_img = $upload.$image_name;
                
                $image->move($upload, $image_name);
                
                unlink($old_image);

                Brand::find($id)->update([
                    'brand_name' => $request->brand_name,
                    'image' => $last_img,
                    'created_at' => Carbon::now()
                ]);

                return back()->with('success', 'Brand Updated Successfully..');

                } else {
                    Brand::find($id)->update([
                        'brand_name' => $request->brand_name,
                        'created_at' => Carbon::now()
                    ]);
    
                    return back()->with('success', 'Brand Updated Successfully..');
                }

            }
        }
