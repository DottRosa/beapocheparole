<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSender extends Controller{

    public function send(Request $request){
        $to = 'info@beatricebasaldella.it';
        $subject = 'Nuova richiesta di informazioni';

        $params = array(
            'email' => strip_tags($request->email),
            'message' => strip_tags($request->message)
        );

        $headers = "From: " . $params['email'] . "\r\n";
        $headers .= "Reply-To: ". $params['message'] . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $template = view('email', ['params' => $params])->render();

        mail($to,$subject,$template,$headers);

        return 'true';
    }
}
