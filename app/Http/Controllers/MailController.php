<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from SUNS company',
            'body' => 'This is for testing mail using gmail.'
        ];

        Mail::to("y.abe@suns-group.biz")->send(new TestMail($details));
        return "Email Sent";
    }
}
