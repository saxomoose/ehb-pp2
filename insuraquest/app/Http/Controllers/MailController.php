<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailInsuraquest;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendEmail() {
        $email = 'bart.tassignon@student.ehb.be';
   
        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.insuraQuest.io'
        ];
  
        Mail::to($email)->send(new EmailInsuraquest($mailData));
   
        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
