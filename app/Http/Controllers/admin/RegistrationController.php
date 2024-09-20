<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('admin.registration.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];

        if (User::create($data)) {
            return redirect()->back()->with(['success' => "Successfully, Registered!"]);
        } else {
            return redirect()->back()->with(['failure' => "Something went wrong!"]);
        }
    }
}
