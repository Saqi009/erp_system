<?php

namespace App\Http\Controllers\employee\Attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class attendanceController extends Controller
{
    public function attendance(){
        return view('employee.attendance.index');

    }
}
