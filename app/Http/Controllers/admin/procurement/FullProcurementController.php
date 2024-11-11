<?php

namespace App\Http\Controllers\admin\procurement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FullProcurement;
use Illuminate\Support\Facades\Auth;

class FullProcurementController extends Controller
{
    public function index() {
        return view('admin.procurement.full_procurement.index', [
            'procurements' => Auth::user()->full_procurements,
        ]);
    }

    public function create() {
        return view('admin.procurement.full_procurement.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'quantity' => ['required'],
            'unit_price' => ['required'],
            'supplier_name' => ['required'],
            'delivery_date' => ['required'],
            'total_price' => ['required'],
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'supplier_name' => $request->supplier_name,
            'delivery_date' => $request->delivery_date,
            'total_price' => $request->total_price,
        ];

        if(FullProcurement::create($data)) {
            return redirect()->back()->with(['success' => "Successfull, Stored data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function edit(FullProcurement $procurement) {
        return view('admin.procurement.full_procurement.edit', [
            'procurement' => $procurement,
        ]);
    }

    public function update (Request $request, FullProcurement $procurement) {
        $request->validate([
            'name' => ['required'],
            'quantity' => ['required'],
            'unit_price' => ['required'],
            'supplier_name' => ['required'],
            'delivery_date' => ['required'],
            'total_price' => ['required'],
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit_price' => $request->unit_price,
            'supplier_name' => $request->supplier_name,
            'delivery_date' => $request->delivery_date,
            'total_price' => $request->total_price,
        ];

        if($procurement->update($data)) {
            return redirect()->back()->with(['success' => "Successfull, updated data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function destroy(FullProcurement $procurement)
    {
        if ($procurement->delete()) {
            return redirect()->route('admin.procurement.full_procurement')->with(['success' => "Successfully, Deleted data"]);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }

}
