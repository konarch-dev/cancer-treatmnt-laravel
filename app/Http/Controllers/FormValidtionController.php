<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Cancer;

use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;

class FormValidtionController extends Controller
{
    public function createUserForm(Request $request) {
        return view('patient.index');
      }


      

public function getData(Request $request){

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
              'password' => ['required',
            'string',
            'min:8',             
            'regex:/[a-z]/',      
            'regex:/[A-Z]/',      
            'regex:/[0-9]/',   
            'regex:/[@$!%*#?&]/',],
              'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
              'state'=>'required',
              'city'=>'required',
              'address' => 'required',
              'pin'=>'required',
              'toc'=>'required',
              'filenames' => 'required|max:10000',
              'filenames.*' => 'required|max:10000',
    ]);

    $files = [];
    if($request->hasfile('filenames'))
     {
        foreach($request->file('filenames') as $file)
        {
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('files'), $name);  
            $files[] = $name;  
        }
     }

   //  $file= new File();
    // $file->filenames = $files;
     $patient = new Patient;
     $patient->name = $request->name;
     $patient->email = $request->email;
     $patient->password = $request->password;
     $patient->contact = $request->contact;
     $patient->state = $request->state;
     $patient->city = $request->city;
     $patient->address = $request->address;
     
     $patient->pincode = $request->pin;
     
     $patient->cancer = $request->toc;
     
     $patient->document = json_encode($files);
     $patient->save();

   //  $file->save();

  //  Patient::create($req->all());
   
    return back()->with('success', 'Your form has been submitted.');

}


public function index()
{ 

        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
       
        \Mail::to('konarch2022@gmail.com')->send(new \App\Mail\NotifyMail($details));
       
        dd("Email is Sent.");
    
} 

public function adminLogin(Request $request)
{

    $request->validate([
        'username' => 'required|email',
              'password' => 'required',
    ]);

    if(($request->username=='admin')&&($request->password=='admin'))
    {
        return view('admin.cancer');
    }
    else {
        
        return view('admin.login');
    }

}



}
