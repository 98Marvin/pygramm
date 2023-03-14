<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());

        $image_name = $name . '.' . $img_ext;

        $upload = 'images/sliders/';

        $last_img = $upload . $image_name;

        $image->move($upload, $image_name);

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('home.slider')
            ->with('success', 'Slider Created Successfullly..');
    }
}
