<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReminderController extends Controller
{
    public function index(Lead $lead)
    {

        return view('employee.lead.reminder.index', [
            'lead' => $lead,
            // 'reminders' => Reminder::where('lead_id', $lead->id)->get(),
            'reminders' => Auth::user()->reminders,
        ]);
    }

    public function store(Request $request, Lead $lead)
    {
        $request->validate([
            'reminder_time' => ['required'],
        ]);

        $data = [
            'reminder_time' => $request->reminder_time,
            'user_id' => Auth::id()
        ];

        if (Reminder::create($data)) {
            return redirect()->back()->with(['success' => "Successfully"]);
        } else {
            return redirect()->back()->with(['failure' => "Operation failed"]);
        }
    }
}
