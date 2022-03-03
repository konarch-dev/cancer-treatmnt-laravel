<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;

class PDFController extends Controller
{
    public function index()
    {
        $data["email"] = "konurocks@gmail.com";
        $data["title"] = "Sample Mail with PDF From OnlineWebTutorBlog.com";
        $data["body"] = "Hi user, This is sample message sent for testing with PDF";
  
        $pdf = PDF::loadView('myTestEmail', $data);
  
        Mail::send('myTestEmail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
  
        dd('Mail sent successfully');
    }
}