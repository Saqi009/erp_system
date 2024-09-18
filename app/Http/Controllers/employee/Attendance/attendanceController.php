<?php

namespace App\Http\Controllers\employee\attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance(){
        return view('employee.attendance.index');

    }
}
