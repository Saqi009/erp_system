<?php

namespace App\Http\Controllers\superadmin\procurement;

use Illuminate\Http\Request;
use App\Models\ProcurementMonth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProcurementMonthController extends Controller
{
    public function index()
    {
        return view('superadmin.procurement.monthly_procurement.index', [
            'procurements' => Auth::user()->procurement_months()->paginate(7),
        ]);
    }

    public function create()
    {
        return view('superadmin.procurement.monthly_procurement.create');
    }

    public function store(Request $request)
    {
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

        if (ProcurementMonth::create($data)) {
            return redirect()->back()->with(['success' => "Successfull, Stored data!"]);
        } else {
            return redirect()->back()->with(['failure' => "something went wrong!"]);
        }
    }

    public function edit(ProcurementMonth $procurement)
    {
        return view('superadmin.procurement.monthly_procurement.edit', [
            'procurement' => $procurement,
        ]);
    }

    public function update(Request $request, ProcurementMonth $procurement)
    {
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

        if ($procurement->update($data)) {
            return redirect()->back()->with(['success' => "Successfully, Updated data"]);
        } else {
            return redirect()->back()->with(['success' => "Something went wrong!"]);
        }
    }

    public function destroy(ProcurementMonth $procurement)
    {
        if ($procurement->delete()) {
            return redirect()->route('superadmin.procurement.monthly_procurement')->with(['success' => "Successfully, Deleted data"]);
        } else {
            return redirect()->back()->with(['failure' => 'Magic has failed to spell!']);
        }
    }
}
