<?php

namespace App\Http\Controllers\superadmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user =  User::find(Auth::id());
    }


    public function index()
    {
        return view('superadmin.admin_info.index', [
            'admins' => User::where('user_type', '=', 1)->paginate(7),
        ]);
    }

    public function show(User $admin)
    {
        return view('superadmin.admin_info.show', [
            'admin' => $admin,
        ]);
    }

    public function edit(User $admin)
    {
        return view('superadmin.admin_info.edit', [
            "admin" => $admin,
        ]);
    }

    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => ['required'],
            'user_email' => ['required', 'email', 'unique:users,user_email,' . $admin->id . ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'user_email' => $request->user_email,
        ];

        if ($admin->update($data)) {
            return redirect()->back()->with(['success' => "Successfully, Updated data!"]);
        } else {
            return redirect()->back()->with(['failure' => "Something went wrong!"]);
        }
    }

    public function password(User $admin)
    {
        return view('superadmin.admin_info.password', [
            'admin' => $admin,
        ]);
    }

    public function password_update(Request $request, User $admin)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'current_password' => ['required'],
        ]);

        if (Hash::check($request->current_password, $admin->password)) {
            if ($admin->update($request->all())) {
                return redirect()->back()->with([
                    'success' => 'Successfully, Updated Password!'
                ]);
            } else {
                return redirect()->back()->with([
                    'failure' => 'Something went wrong!'
                ]);
            }
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match!']);
        }
    }

    public function destroy(User $admin)
    {
        if ($admin->delete()) {
            return redirect()->route('superadmin.admin_info')->with(['success' => "Successfully, Deleted message!"]);
        } else {
            return redirect()->back()->with(['failure' => 'Something went wrong!']);
        }
    }
}
