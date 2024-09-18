<?php

namespace App\Http\Controllers\employee\attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAttendanceController extends Controller
{
    public function addattendance(){
        return view('employee.attendance.addattendance');
    }
}
