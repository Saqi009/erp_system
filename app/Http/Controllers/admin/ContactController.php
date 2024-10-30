<?php

namespace App\Http\Controllers\admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('admin.contact.index', [
            'contacts' => Contact::all(),
        ]);
    }

    public function delete(Contact $contact)
    {
        if ($contact->delete()) {
            return redirect()->back()->with(['success' => "Successfully, Deleted message!"]);
        } else {
            return redirect()->back()->with(['failure' => 'Something went wrong!']);
        }
    }
}
