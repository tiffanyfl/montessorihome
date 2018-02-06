<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\MailNewsletter;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function getForm()
    {
        return view('contact');
    }

    public function postForm(ContactRequest $request)
    {
        Mail::send('email_contact', $request->all(), function($message)
        {
            $message->to('contact@montessorihome.fr')->subject('Contact');
        });
//        Mail::to('contact@montessorihome.fr')->send(new MailNewsletter($request));


        return view('confirm');

    }
}
