<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use Validator;
use Config;
use App\Mail\SystemMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emails = Email::orderBy('id','DESC')->paginate(5);
        return view('mailing.index',compact('emails'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fromEmail = Auth::user()->email;
        return view('mailing.create',compact('fromEmail'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'to' => 'required|email',
            'from' => 'required|email',
            'subject' => 'required',
            'body' => 'required'
        ]);

        $mailData = [
            'title' => $request->subject,
            'body' => $request->body
        ];

        Mail::to($request->to)->send(new SystemMail($mailData));
        $user_create = Email::create([
            'to' => $request->to,
            'from' => Auth::user()->email,
            'subject' => $request->subject,
            'body' => $request->body,
            'email_status' => 'Sent'
        ]);
    
        return redirect()->route('mailing.index')
                        ->with('success','Email created successfully');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Email::find($id);
        return view('mailing.show',compact('email'));
    }

    public function sentItem() {

        $emails = Email::where('from', Auth::user()->email)->paginate(5);
        return view('mailing.index',compact('emails'));
    }

    public function inboxItem() {

        $emails = Email::where('to', Auth::user()->email)->paginate(5);
        return view('mailing.index',compact('emails'));
    }

}
