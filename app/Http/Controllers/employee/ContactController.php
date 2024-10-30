<?php

namespace App\Http\Controllers\employee;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('employee.contact.index');
    }

    public function send_email(Request $request)
    {
        $request->validate([
            'department' => ['required'],
            'message' => ['required'],
        ]);

        $data = [
            'name' => Auth::user()->name,
            'department' => $request->department,
            'message' => $request->message,
        ];


        if ($request->department == 'hr') {
            $adminEmail = "naimsaqijee009@gmail.com";
        }

        if ($request->department == 'it') {
            $adminEmail = "asimcool9099@gmail.com";
        }

        if ($request->department == 'na') {
            $adminEmail = "nancy@zingoassist.com";
        }

        $emailDatabase = Contact::create($data);

        $mail = Mail::to($adminEmail)->send(new ContactMail($data));


        if ($mail && $emailDatabase) {
            return redirect()->back()->with(['success' => "Successfully, sent!"]);
        } else {
            return redirect()->back()->with(['failure' => "Unable to send!"]);
        }
    }
}
