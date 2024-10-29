<?php

namespace App\Http\Controllers\admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('admin.profile.index');
    }

    public function details(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'user_name' => ['required', 'unique:users,user_name,' . Auth::user()->id . ',id'],
        ]);

        if (Auth::user()->update($request->all())) {
            return redirect()->back()->with([
                'success' => 'Magic has been spelled!'
            ]);
        } else {
            return redirect()->back()->with([
                'failure' => 'Magic has failed to spell!'
            ]);
        }
    }


    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'current_password' => ['required'],
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            if (Auth::user()->update($request->all())) {
                return redirect()->back()->with([
                    'success' => 'Magic has been spelled!'
                ]);
            } else {
                return redirect()->back()->with([
                    'failure' => 'Magic has failed to spell!'
                ]);
            }
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match!']);
        }
    }
}
