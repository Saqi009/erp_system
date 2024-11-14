<?php

namespace App\Http\Controllers\admin;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index() {
        return view('admin.admin_lead.index', [
            'leads' => Auth::user()->leads()->paginate(7),
        ]);
    }

    public function create()
    {
        $time_zones = [
            'EST',
            'PST',
            'CST',
        ];

        return view('admin.admin_lead.create', [
            'time_zones' => $time_zones,
        ]);
    }

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
            return redirect()->back()->with(['failure' => 'Something went wrong!']);
        }
    }

    public function show(Lead $lead)
    {
        $time_zones = [
            "EST",
            "PST",
            "CST",
        ];

        return view('admin.admin_lead.show', [
            'time_zones' => $time_zones,
            'lead' => $lead,
        ]);
    }

    public function edit(Lead $lead)
    {
        $time_zones = [
            "EST",
            "PST",
            "CST",
        ];

        return view('admin.admin_lead.edit', [
            'time_zones' => $time_zones,
            'lead' => $lead,
        ]);
    }

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

    public function destroy(Lead $lead)
    {
        if ($lead->delete()) {
            return redirect()->route('admin.admin_lead')->with(['success' => "Successfully, Deleted data"]);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

}
