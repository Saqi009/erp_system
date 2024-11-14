<?php

namespace App\Http\Controllers\superadmin\procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index() {
        return view('superadmin.procurement.index');
    }
}

