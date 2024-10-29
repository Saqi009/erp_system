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

        $user = Auth::user();

        $today = date('Y-m-d');

        return view('employee.attendance.addattendance', [
            'time' => Carbon::now()->setTimezone('GMT+5'),
            'markedToday' => $user->attendances()->where('date', $today)->exists(),
        ]);
    }

    public function mark(Request $request) {

        $user = Auth::user();
        $today = date('Y-m-d');


        $request->validate([
            'work_shift' => ['required'],
            'floor_manager' => ['required'],
        ]);

        $data = [
            'user_id' => $user->id,
            'name' => $user->name,
            'work_shift' => $request->work_shift,
            'floor_manager' => $request->floor_manager,
            'date' => $today,
            'status' => 'Present',
        ];

        // Check if attendance is already marked today
        if ($user->attendances()->where('date', $today)->exists()) {
            return redirect()->back()->with('error', 'You have already marked attendance for today.');
        }

        if(Attendance::create($data)) {
            return redirect()->back()->with(['success' => "Your attendance has been successfully stamped!"]);
        } else {
            return redirect()->back()->with(['failure' => "Your attendance has not been stamped!"]);
        }

    }


    public function leave(Request $request) {

        $user = Auth::user();
        $today = date('Y-m-d');


        $request->validate([
            'leave_reason' => ['required'],
        ]);

        $data = [
            'user_id' => $user->id,
            'name' => $user->name,
            'leave_reason' => $request->leave_reason,
            'date' => $today,
            'status' => 'Leave',
        ];

        // Check if attendance is already marked today
        if ($user->attendances()->where('date', $today)->exists()) {
            return redirect()->back()->with('error', 'You have already marked attendance for today.');
        }

        if(Attendance::create($data)) {
            return redirect()->back()->with(['success' => "Your attendance has been successfully stamped!"]);
        } else {
            return redirect()->back()->with(['failure' => "Your attendance has not been stamped!"]);
        }

    }

    public function yourattendance() {
        $user = Auth::user();
        return view('employee.attendance.yourattendance', [
            'attendances' => $user->attendances()->get(),
        ]);
    }

}
