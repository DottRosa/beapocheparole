<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSender extends Controller{

    public function send(Request $request){
        $data = [1];
        Mail::send('home', $data, function ($message) {
            $message->from('us@example.com', 'Laravel');
            $message->to('marco1rosa@gmail.com');
        });

        return true;
    }
}
