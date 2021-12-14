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

  public function document_requestPost(Request $request){
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

    $name = $request->name;
    $email = $request->email;
    $title = "title";
    $content = $request->content;

    \Mail::send('visitor_email', ['name' => $name, 'email' => "info@e-shinwa.net", 'title' => $title, 'content' => $content], function ($message) {

        $message->to('testuserxxx923@gmail.com')->subject('Subject of the message!');

    });

    return view('contact-done');
      

      /* Mail::send('visitor_email', [
      'title' => "no title",
      'name' => $request->get('name'),
      'email' => $request->get('email'),
      'content' => $request->get('content') ],
      function ($message) {
              $message->from('info@e-shinwa.net');
              $message->to('redapple961129@hotmail.com', 'Your Name')
                      ->subject('Your Website Contact Form');
      }); */

    return view('contact-done');#back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

  }

  public function contactPost(Request $request){
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
    $name = $request->name;
    $email = $request->email;
    $title = "title";
    $content = $request->content;


    \Mail::send('visitor_email', ['name' => $name, 'email' => $email, 'title' => $title, 'content' => $content], function ($message) {

        $message->to('testuserxxx923@gmail.com')->subject('Subject of the message!');
    });
    
    return view('contact-done');

    /*  Mail::send('visitor_email', [
        'title' => "no title",
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'content' => $request->get('content') ],
        function ($message) {
                $message->from('info@e-shinwa.net');
                $message->to('redapple961129@hotmail.com', 'Your Name')
                        ->subject('Your Website Contact Form');
    });*/

    return view('contact-done');#back()->with('success', 'Thanks for contacting me, I will get back to you soon!');

  }
}
