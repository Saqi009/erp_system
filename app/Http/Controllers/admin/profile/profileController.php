<?php

namespace App\Http\Controllers\admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    private $authenticated_user;

    public function __construct()
    {
        $this->authenticated_user = Auth::user();
    }


    public function add_more()
    {
        return view('admin.profile.addmore', [
            'user' => $this->authenticated_user,
        ]);
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'real_name' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:10', 'max:11'],
            'cnic' => ['required', 'min:13', 'max:15'],
            'dob' => ['required'],
            'bank_no' => ['required'],
            'jd' => ['required'],
            'picture' => ['image', 'mimes:png,jpg,jpeg,webp', 'required'],
            'about_me' => ['required'],
        ]);

        $target_directory = 'template/img/photos/';

        if ($this->authenticated_user->picture && File::exists($target_directory . $this->authenticated_user->picture)) {
            unlink($target_directory . $this->authenticated_user->picture);
        }

        $file_name = "ACI-SHOPPERS-" . microtime(true) . "." . $request->picture->extension();

        if ($request->picture->move(public_path($target_directory), $file_name)) {
            $data = [
                'name' => $this->authenticated_user->name,
                'real_name' => $request->real_name,
                'user_name' => $this->authenticated_user->user_name,
                'password' => $this->authenticated_user->password,
                'email' => $request->email,
                'phone' => $request->phone,
                'cnic' => $request->cnic,
                'dob' => $request->dob,
                'bank_no' => $request->bank_no,
                'jd' => $request->jd,
                'picture' => $file_name,
                'about_me' => $request->about_me,
            ];

            if ($this->authenticated_user->update($data)) {
                return redirect()->back()->with(['success' => "Successfully, Stored data"]);
            } else {
                return redirect()->back()->with(['failure' => "Oops, Operation Failed"]);
            }
        } else {
            return redirect()->back()->with(['failure' => "Unable to upload picture!"]);
        }
    }

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
                    'success' => 'Successfully, Update password!'
                ]);
            } else {
                return redirect()->back()->with([
                    'failure' => 'Operation failed!'
                ]);
            }
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match!']);
        }
    }
}
