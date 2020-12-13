<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

// import van de EmailInsuraquest mailable class
use App\Mail\EmailInsuraquest;

// zal een response geven aan de user als de mail succesvol verstuurd is via deze API
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
