<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use App\User;
use Mail;
use Session;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To My Blog';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About';
        return view('pages.about')->with('title', $title);
    }

    public function contact(){
      return view('pages.contact');
    }

    public function ContactSend(Request $request){
      $this->validate($request, [
        'email' => 'required|max:255',
        'subject' => 'min:3',
        'message' => 'min:10'
      ]);

      $data = [
        'email' => $request->email,
        'subject' => $request->subject,
        'messageBody' => $request->message
      ];

      Mail::send('emails.contact', $data, function($message) use ($data){
        $message->setReplyTo($data['email']);
          $message->to('mvmartinxd@gmail.com');
          $message->subject($data['subject']);
      });

      Session::flash('success', 'Your email has ben send');

      return redirect('/');
    }
}
