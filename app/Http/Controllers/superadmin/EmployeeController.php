<?php

namespace App\Http\Controllers\superadmin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    private $user;

    public function __construct()
    {
        $this->user =  User::find(Auth::id());
    }


    public function index()
    {
        return view('superadmin.employee_info.index', [
            'employees' => User::where('user_type', '=', 0)->get(),
        ]);
    }

    public function show(User $employee)
    {
        return view('superadmin.employee_info.show', [
            'employee' => $employee,
        ]);
    }

    public function edit(User $employee)
    {
        return view('superadmin.employee_info.edit', [
            "employee" => $employee,
        ]);
    }

    public function update(Request $request, User $employee)
    {
        $request->validate([
            'name' => ['required'],
            'user_email' => ['required', 'email', 'unique:users,user_email,' . $employee->id. ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'user_email' => $request->user_email,
        ];

        if ($employee->update($data)) {
            return redirect()->back()->with(['success' => "Successfully, Updated data!"]);
        } else {
            return redirect()->back()->with(['failure' => "Something went wrong!"]);
        }
    }

    public function password(User $employee)
    {
        return view('superadmin.employee_info.password', [
            'employee' => $employee,
        ]);
    }

    public function password_update(Request $request, User $employee)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
            'current_password' => ['required'],
        ]);

        if (Hash::check($request->current_password, $employee->password)) {
            if ($employee->update($request->all())) {
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

    public function destroy(User $employee)
    {
        if ($employee->delete()) {
            return redirect()->route('superadmin.employee_info')->with(['success' => "Successfully, Deleted message!"]);
        } else {
            return redirect()->back()->with(['failure' => 'Something went wrong!']);
        }
    }
}
