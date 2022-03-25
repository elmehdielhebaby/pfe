<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        
        $details = [
            'title' =>'title',
            'body' =>'body',

        ];

        Mail::to("pferendezvous@gmail.com")->send(new TestMail($details));
        return "email send";
    }
}
