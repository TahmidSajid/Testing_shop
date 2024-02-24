<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactPageController extends Controller
{
    public function contact_page(){
        return view ('frontend.contact_us');
    }
    public function contact_page_form(Request $request){

        // return $request->except('_token');
        Mail::to($request->contact_email)->send(new ContactMail($request->except('_token')));
        return back()->with('email_sent',"email sent successfully");

    }
}
