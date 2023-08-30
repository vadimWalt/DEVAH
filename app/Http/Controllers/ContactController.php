<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:5',
            'g-recaptcha-response' => ['required', 'captcha'], // Add the CAPTCHA validation rule
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        Config::set('mail.from.name', $name);

        // Send email using the ContactFormMail mailer
        Mail::to('aboalnaar6@gmail.com')->send(new ContactFormMail($formFields));

        return redirect('/')->with('message', 'We received your message and will respond accordingly!');
    }
}
