<?php

namespace App\Http\Controllers\superadmin\procurement;

use Illuminate\Http\Request;
use App\Models\LaptopProcurement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AssignLaptopController extends Controller
{
    public function index()
    {
        return view('superadmin.procurement.assign_laptop.index', [
            'laptops' => Auth::user()->assign_laptop()->paginate(7),
        ]);
    }

    public function create()
    {
        $shift = [
            'Day Shift',
            'Night Shift',
        ];
        return view('superadmin.procurement.assign_laptop.create', [
            'shifts' => $shift,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'model' => ['required'],
            'shift' => ['required'],
            'date' => ['required'],
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'model' => $request->model,
            'shift' => $request->shift,
            'date' => $request->date,
        ];

        if (LaptopProcurement::create($data)) {
            return redirect()->back()->with(['success' => "Successfull, Stored data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function edit(LaptopProcurement $laptop)
    {
        $shift = [
            'Day Shift',
            'Night Shift',
        ];
        return view('superadmin.procurement.assign_laptop.edit', [
            'laptop' => $laptop,
            'shifts' => $shift,
        ]);
    }

    public function update(Request $request, LaptopProcurement $laptop)
    {
        $request->validate([
            'name' => ['required'],
            'model' => ['required'],
            'shift' => ['required'],
            'date' => ['required'],
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'model' => $request->model,
            'shift' => $request->shift,
            'date' => $request->date,
        ];

        if ($laptop->update($data)) {
            return redirect()->back()->with(['success' => "Successfull, Updated data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function destroy(LaptopProcurement $laptop)
    {
        if ($laptop->delete()) {
            return redirect()->route('superadmin.procurement.assign_laptop_procurement')->with(['success' => "Successfully, Deleted data"]);
        } else {
            return redirect()->back()->with(['failure' => 'Operation Failed!']);
        }
    }
}
