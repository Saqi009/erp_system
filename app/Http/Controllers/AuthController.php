<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except(['_token', 'submit']))) {
            $user_type = Auth::user()->user_type;
            if ($user_type == '1') {
                return redirect()->route('admin.dashboard');
            } else if ($user_type == '2') {
                return redirect()->route('superadmin.dashboard');
            } else if ($user_type == '3') {
                return redirect()->back()->with(['userpanel' => "third panel"]);
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->back()->with(['failure' => "Invalid login details!"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
