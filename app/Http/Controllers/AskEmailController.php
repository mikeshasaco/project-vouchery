<?php

namespace App\Http\Controllers;

use App\Jobs\HelpEmailJob;
use App\Mail\HelpEmailMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class AskEmailController extends Controller
{
    public function askemail()
    {
        return view('help.question');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'sirname' => 'required',
            'email' => 'required',
            'bodymessage' => ' required',
        ]);

        $data = [
            'sirname' => $request->sirname,
            'email' => $request->email,
            'bodymessage' =>$request->bodymessage
        ];

        Mail::send('help.contactinfo', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->subject("Question Has Been Submitted");
            $message->to('voucheryhub@gmail.com');
        });
        //
        // Mail::to('mikeshasaco@gmail.com')->send(new HelpEmailMailable($data));

        //  HelpEmailJob::dispatch()
        // ->delay(Carbon::now()->addSeconds(5));
        Session::flash('helpnoty', 'Your Question has been sent.');
        return     redirect('/');
    }

    public function pagenotfound()
    {
        return view('errors.404');
    }

    public function FAQ(){
        return view('help.faq');
    }

    public function privacypolicy(){
        return view('legal.privacypolicy');
    }

    public function termofservice(){
        return view('legal.termofservice');
    }
}
