<?php

namespace App\Http\Controllers\admin;

use App\Models\Lead;
use App\Models\Todo;
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
                'attendances' => Attendance::where('name', "like", "%" . $search . "%")->get()
            ]);
        } else {
            return view('admin.attendance.index', [
                'attendances' => Attendance::all(),
            ]);
        }
    }

    public function lead()
    {
        return view('admin.lead.index', [
            // 'leads' => Auth::user()->leads
            'leads' => Lead::all(),
            // 'leads' => Auth::user()->leads
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
            'tasks' => Todo::all()
        ]);
    }
}
