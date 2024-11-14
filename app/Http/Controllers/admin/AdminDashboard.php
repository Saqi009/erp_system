<?php

namespace App\Http\Controllers\admin;

use App\Models\Lead;
use App\Models\Todo;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function attendance(Request $request)
    {

        $search = $request->search ?? null;

        if ($search) {
            return view('admin.attendance.index', [
                'attendances' => Attendance::where('name', "like", "%" . $search . "%")->paginate(5)
            ]);
        } else {
            return view('admin.attendance.index', [
                'attendances' => Attendance::paginate(5),
            ]);
        }
    }

    public function lead()
    {
        return view('admin.lead.index', [
            'leads' => Lead::whereHas('user', function ($query) {
                $query->where('user_type', '0');
            })->paginate(5),

        ]);
    }

    public function show(Lead $lead)
    {
        return view('admin.lead.show', [
            'lead' => $lead,
        ]);
    }

    public function employees_todo() {
        return view('admin.employees_todo.index', [
            'tasks' => Todo::whereHas('user', function ($query) {
                $query->where('user_type', '0');
            })->get(),
        ]);
    }
}
