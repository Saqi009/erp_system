<?php

namespace App\Http\Controllers\admin\procurement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AssignProcurement;
use App\Models\LaptopProcurement;
use Illuminate\Support\Facades\Auth;

class AssignLaptopController extends Controller
{
    public function index() {
        return view('admin.procurement.assign_laptop.index', [
            'laptops' => Auth::user()->assign_laptop,
        ]);
    }

    public function create() {
        return view('admin.procurement.assign_laptop.create');
    }

    public function store(Request $request) {
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

        if(LaptopProcurement::create($data)) {
            return redirect()->back()->with(['success' => "Successfull, Stored data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function edit(LaptopProcurement $laptop) {
        return view('admin.procurement.assign_laptop.edit', [
            'laptop' => $laptop,
        ]);
    }

    public function update (Request $request, LaptopProcurement $laptop) {
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

        if($laptop->update($data)) {
            return redirect()->back()->with(['success' => "Successfull, Updated data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function destroy(LaptopProcurement $laptop)
    {
        if ($laptop->delete()) {
            return redirect()->route('admin.procurement.assign_laptop_procurement')->with(['success' => "Successfully, Deleted data"]);
        } else {
            return redirect()->back()->with(['failure' => 'Operation Failed!']);
        }
    }

}
