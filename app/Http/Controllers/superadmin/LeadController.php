<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Lead;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeadController extends Controller
{
    public function index() {
        return view('superadmin.admin_lead.index', [
            'leads' => Lead::whereHas('user', function ($query) {
                $query->where('user_type', '1');
            })->paginate(3),
        ]);
    }

    public function show(Lead $lead)
    {
        return view('superadmin.admin_lead.show', [
            'lead' => $lead,
        ]);
    }
}
