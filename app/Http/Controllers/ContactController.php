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
      'agree' => 'required'

    ]);

  Mail::send('visitor_email', [
    'name' => $request->get('name'),
    'email' => $request->get('email'),
    'companyName' => $request->get('companyName'),
    'phoneNumber' => $request->get('phoneNumber'),
    'purpose' => $request->get('purpose'),
    'content' => $request->get('content') ],
    function ($message) {
      $message->from('info@e-shinwa.net');
      $message->to('info@e-shinwa.net', 'Your Name')
        ->subject("資料請求");
  });

  return redirect('/document-request/done');

  }

  public function contactPost(Request $request){
    $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'content' => 'required',
        'companyName' => 'required',
        'phoneNumber' => 'required',
        'purpose' => 'required',
        'agree' => 'required'

    ]);

    Mail::send('visitor_email', [
      'name' => $request->get('name'),
      'email' => $request->get('email'),
      'companyName' => $request->get('companyName'),
      'phoneNumber' => $request->get('phoneNumber'),
      'purpose' => $request->get('purpose'),
      'content' => $request->get('content') ],
      function ($message) {
        $message->from('info@e-shinwa.net');
        $message->to('info@e-shinwa.net', 'Your Name')
          ->subject("お問い合わせ");
    });

    return redirect('/contact/done');

  }
}
