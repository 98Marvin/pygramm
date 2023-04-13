<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $clients = Client::latest()->paginate(5);

        return view('admin.client.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'client_name' => 'required|unique:clients|min:4',
                'image' => 'required|mimes:jpg,jpeg,png',
            ],

            [
                'client_name.required' => 'Please enter Client Name',
                'image.required' => 'Please Choose an Image...!!',
            ],
        );

        $image = $request->file('image');
        $name = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());

        $image_name = $name . '.' . $img_ext;

        $upload = 'images/client/';

        $last_img = $upload . $image_name;

        $image->move($upload, $image_name);

        Client::insert([
            'client_name' => $request->client_name,
            'image' => $last_img,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Client Created Successfully...',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'client_name' => 'required|min:4',
                'image' => 'mimes:jpg,jpeg,png',
            ],

            [
                'client_name.required' => 'Please enter Client Name',
            ],
        );

        $old_image = $request->old_image;
        $image = $request->file('image');

        if ($image) {
            $name = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());

            $image_name = $name . '.' . $img_ext;

            $upload = 'images/client/';

            $last_img = $upload . $image_name;

            $image->move($upload, $image_name);

            unlink($old_image);

            Client::find($id)->update([
                'client_name' => $request->client_name,
                'image' => $last_img,
                'created_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Client Updated Successfully...',
                'alert-type' => 'info',
            ];

            return back()->with($notification);
        } else {
            Client::find($id)->update([
                'client_name' => $request->client_name,
                'created_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Client Updated Successfully...',
                'alert-type' => 'warning',
            ];

            return back()->with($notification);
        }
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        unlink($client->image);
        $client->delete();

        $notification = [
            'message' => 'Client Deleted Successfully...',
            'alert-type' => 'error',
        ];

        return back()->with($notification);
    }
}
