<?php

namespace App\Http\Controllers\admin;

use App\Models\Lead;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboard extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }

    public function attendance() {
        return view('admin.attendance.index', [
            'attendances' => Attendance::all(),
        ]);
    }

    public function lead() {
        return view('admin.lead.index', [
            'leads' => Lead::all()
        ]);
    }

    public function show(Lead $lead) {
        return view('admin.lead.show', [
            'lead' => $lead,
        ]);
    }

}
