<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index() {
        return view('admin.contact.index', [
            'contacts' => Contact::all(),
        ]);
    }
}
