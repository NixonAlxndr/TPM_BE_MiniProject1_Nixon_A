<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(Request $request){
        $mailData = [
            'title' => 'mail from me',
            'body' => 'Testing email'
        ];

        Mail::to('zdeghardon@gmail.com')->send(new DemoMail($mailData));
        dd('success');
    }
}
