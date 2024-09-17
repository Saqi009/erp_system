<?php

namespace App\Http\Controllers\employee\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function profile(){
        return view('employee.profile.index');
    }
}
