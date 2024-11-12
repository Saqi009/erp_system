<?php

namespace App\Http\Controllers\superadmin;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    public function index() {
        return view('superadmin.admin_todo.index', [
            'tasks' => Todo::whereHas('user', function ($query) {
                $query->where('user_type', '1');
            })->get(),
        ]);
    }
}
