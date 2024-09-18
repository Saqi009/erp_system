<?php

namespace App\Http\Controllers\employee\attendance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class attendancereportcontroller extends Controller
{

    public function attendancereport(){
        return view('employee.attendance.attendancereport');
    }
}
