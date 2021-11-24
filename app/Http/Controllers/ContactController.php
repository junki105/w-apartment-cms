<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contact() {
        return view('contact');
    }
    public function document_request() {
        return view('document-request');
    }

    public function document_requestPost(Request $request) {
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                        'content' => 'required',
                        'companyName' => 'required',
                        'phoneNumber' => 'required',
                        'purpose' => 'required',
                        'content' => 'required',
                        'agree' => 'required'

                ]);

        Mail::send('contact-done', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'content' => $request->get('content') ],
                function ($message) {
                        $message->from('redapple961129@hotmail.com');
                        $message->to('redapple961129@hotmail.com', 'Your Name')
                                ->subject('Your Website Contact Form');
        });

        return view('contact-done');#back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

    }

    public function contactPost(Request $request) {
        $this->validate($request, [
                        'name' => 'required',
                        'email' => 'required|email',
                        'content' => 'required',
                        'companyName' => 'required',
                        'phoneNumber' => 'required',
                        'purpose' => 'required',
                        'content' => 'required',
                        'agree' => 'required'

                ]);

        Mail::send('contact-done', [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'content' => $request->get('content') ],
                function ($message) {
                        $message->from('redapple961129@hotmail.com');
                        $message->to('redapple961129@hotmail.com', 'Your Name')
                                ->subject('Your Website Contact Form');
        });

        return view('contact-done');#back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

    }
}