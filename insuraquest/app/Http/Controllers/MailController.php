<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;

// import van de EmailInsuraquest mailable class
use App\Mail\EmailInsuraquest;

// zal een response geven aan de user als de mail succesvol verstuurd is via deze API
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendEmail($id, $filename) {

        $user = auth()->user();
        $email = $user->email;

       
   
        $mailData = [
            'title' => 'InsuraQuest Email',
            'url' => 'https://www.insuraQuest.io',
            'pdf' => Storage::disk('local')->mail('public/' . $filename)
            
        ];
  
        Mail::to($email)->send(new EmailInsuraquest($mailData));
   
        return redirect()->route('search')

        -> with('success-mail', 'Mail was successfully sent');
    }
}
