<?php

namespace App\Http\Controllers;

use App\Mail\ContactInfo;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }


    // Store and Send Message to Hire Hub
    public function send(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'text' => 'required',
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->text
        ]);

        Mail::to('hirehub05@gmail.com')->send(new ContactInfo($contact));

        return redirect()->back()->with('success', 'Message Sent Successfully !!!');

    }
}
