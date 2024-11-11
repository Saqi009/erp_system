<?php

namespace App\Http\Controllers\admin\procurement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index() {
        return view('admin.procurement.index');
    }
}
