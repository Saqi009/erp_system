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
            'user_name' => ['required', 'unique:users,user_name'],
            'password' => ['required', 'confirmed'],
        ]);
        
        $data = [
            'name' => $request->name,
            'user_name' => $request->user_name,
            'password' => $request->password
        ];

        if (User::create($data)) {
            return redirect()->back()->with(['success' => "Successfully, Registered!"]);
        } else {
            return redirect()->back()->with(['failure' => "Something went wrong!"]);
        }
    }
}
