<?php

namespace App\Http\Controllers\employee\profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function profile()
    {
        return view('employee.profile.index');
    }

    public function details(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id . ',id'],
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
