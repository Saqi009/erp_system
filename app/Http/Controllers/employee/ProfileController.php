<?php

namespace App\Http\Controllers\employee;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    private $authenticated_user;

    public function __construct()
    {
        $this->authenticated_user = Auth::user();
    }


    public function index()
    {
        return view('employee.profile.index', [
            'user' => $this->authenticated_user,
        ]);
    }

    public function create()
    {
        return view('employee.profile.create');
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
}
