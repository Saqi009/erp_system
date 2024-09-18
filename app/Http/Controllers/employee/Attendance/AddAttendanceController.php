<?php

namespace App\Http\Controllers\employee\attendance;

use Carbon\Carbon;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AddAttendanceController extends Controller
{
    public function addattendance(){
        return view('employee.attendance.addattendance', [
            'time' => Carbon::now()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'work_shift' => ['required'],
            'floor_manager' => ['required'],
            // 'date' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'work_shift' => $request->work_shift,
            'floor_manager' => $request->floor_manager,
            'date' => $request->date,
        ];

        if(Attendance::create($data)) {
            return redirect()->back()->with(['success' => "Your attendance has been successfully stamped!"]);
        } else {
            return redirect()->back()->with(['failure' => "Your attendance has not been stamped!"]);
        }



    }

}
