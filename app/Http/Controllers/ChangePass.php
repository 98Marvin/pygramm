<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function index()
    {
        return view('admin.change_password');
    }

    public function updatePassword (Request $request) {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password Changed Sucessfully');
        } else {
            return back()->with('error', 'Current Password is not correct');
            
        }
        
    }

    public function profile () {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);
            if($user) {
                return view('admin.profile', compact('user'));
                
            }
        }

    }
   
    public function updateProfile (Request $request) {
            $user = User::find(Auth::user()->id);
            if($user) {
                $user->name = $request['name'];
                $user->email = $request['email'];

                $user->save();

                return back()->with('success', 'User Profile was Updated Successfully..');
            } else {
                return back();
            }

    }
}
