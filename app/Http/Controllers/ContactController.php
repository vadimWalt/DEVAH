<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:5'],
        ]);
    
        // Send email using the ContactFormMail mailer
        Mail::to('your@email.com')->send(new ContactFormMail($formFields));
    
        return redirect('/')->with('message', 'We received your message and will respond accordingly!');
    }
}
