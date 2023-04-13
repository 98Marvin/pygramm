<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

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

    public function edit($id)
    {
        $slide = Slider::findOrFail($id);

        return view('admin.slider.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $old_image = $request->old_image;
        $image = $request->file('image');

        if ($image) {
            $name = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());

            $image_name = $name . '.' . $img_ext;

            $upload = 'images/sliders/';

            $last_img = $upload . $image_name;

            $image->move($upload, $image_name);

            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('home.slider')
                ->with('success', 'Slider Updated Successfully..');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('home.slider')
                ->with('success', 'Slider Updated Successfully..');
        }
    }

    public function delete($id) {
        $slide = Slider::findOrFail($id);
        unlink($slide->image);
        $slide->delete();
        
        return back()->with('success', 'Slide Deleted Successfully...!!!');

    }

    public function pricing () {
        return view('pricing');
    }

    public function services () {
        $services = Service::latest()->paginate(9);
        return view('admin.services.index', compact('services'));
    }

    public function portfolio () {
        $portfolios = Portfolio::all();

        return view('admin.portfolio.index', compact('portfolios'));
    }

    public function all () {
        return view('portfolio.index');
    }
    
    public function single ($id) {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolio.single', compact('portfolio'));
    }

    public function addPortfolio () {
        return view('admin.portfolio.create');
    }
   
    public function storePortfolio (Request $request) {
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(800, 500)->save('images/portfolios/'.$name_gen);

        $last_img = 'images/portfolios/'.$name_gen;

        Portfolio::insert([
            'name' => $request->name,
            'client' => $request->client,
            'category' => $request->category,
            'url' => $request->url,
            'image' => $last_img,
            'created_at' => Carbon::now()
            
        ]);

        return back()->with('success', 'Portfolio Created Successfully...!!!');

        
    }


}
