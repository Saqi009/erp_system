<?php

namespace App\Http\Controllers\superadmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('superadmin.registration.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'string'],
            'user_email' => ['required', 'email', 'unique:users,user_email,' . Auth::user()->id . ',id'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'user_email' => $request->user_email,
            'password' => $request->password
        ];

        if (User::create($data)) {
            return redirect()->back()->with(['success' => "Successfully, Registered!"]);
        } else {
            return redirect()->back()->with(['failure' => "Something went wrong!"]);
        }
    }
}
