<?php

namespace App\Http\Controllers\employee\lead;

use App\Models\Lead;
use App\Models\Reminder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LeadController extends Controller
{
    public function index()
    {
        // $user = User::whereId(Autjh::id())->with('contacts')->first();

        return view('employee.lead.index', [
            'leads' => Auth::user()->leads,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $time_zones = [
            'EST',
            'PST',
            'CST',
        ];
        return view('employee.lead.create', [
            'time_zones' => $time_zones,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'time_zone' => ['required', 'string'],
            'phone_number' => ['required'],
            'remark' => ['required'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'time_zone' => $request->time_zone,
            'phone_number' => $request->phone_number,
            'remark' => $request->remark,
            'user_id' => Auth::id()
        ];

        if (Lead::create($data)) {
            return redirect()->back()->with(['success' => 'Successfully, stored the data!']);
        } else {
            return redirect()->back()->with(['failure' => 'Something went wrong !']);
        }
    }



    public function show(Lead $lead)
    {
        $time_zones = [
            "EST",
            "PST",
            "CST",
        ];

        return view('employee.lead.show', [
            'time_zones' => $time_zones,
            'lead' => $lead,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        $time_zones = [
            "EST",
            "PST",
            "CST",
        ];

        return view('employee.lead.edit', [
            'time_zones' => $time_zones,
            'lead' => $lead,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'email' => ['required', 'string'],
            'time_zone' => ['required', 'string'],
            'remark' => ['required', 'string'],
        ]);

        if ($lead->update($request->all())) {
            return redirect()->back()->with(['success' => 'Successfully, Updated data!']);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        if ($lead->delete()) {
            return redirect()->route('employee.leads')->with(['success' => "Successfully, Deleted data"]);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

}
