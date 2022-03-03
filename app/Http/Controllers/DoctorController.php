<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cancer;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;
use PDF;

use File;
use Response;

class DoctorController extends Controller
{
        public function index()
    {
        return view('doctor.login');
    }  



    public function doctorLogin(Request $request)
{
    $users=Doctor::select('*')
                ->where('email', $request->username)
                ->where('password', $request->password)
                ->get();
$data=count($users);
if($data>0)
{
 session()->put('user', $users[0]['name']);
 session()->put('email', $users[0]['email']);
 session()->put('id', $users[0]['id']);
 session()->put('special', $users[0]['special']);

    return redirect('enquiry');

}
else
{
   return view('doctor.login');
}

}




    function showData(){
     
    $users=Doctor::select('email','special')
                ->where('id', session('id'))
                ->get();

 $data=Patient::select('*')
                ->where('cancer',$users[0]['special'])
                ->paginate(5);


 $plan=Plan::select('pid','did')->get();

$myplan=array();
foreach($plan as $mykey=>$myval)
{

        
    $myplan[$myval['pid']][]=$myval['did'];

}               
//print_r($myplan);
return view('doctor.enquiry',["patient"=>$data,"plan"=>$myplan]);


}

public function doctorLogout(Request $request)
{
$request->session()->flush();

    return redirect('doctorlogin');


    }

    public function planData($id)
{
       $plan=DB::table('patients')->where('id', $id)->get();

       $data=count($plan);
       if($data>0)
       {
        return view('doctor.plan',["patient"=>$plan]);
       }
       else{

        return redirect('enquiry');
       }

    }

    public function chksave(Request $req)
{       
      return response()->json(array("content"=>$req->Content, 200));

    }


    public function downloadfile($file)
{       
              $filepath = public_path('files/'.$file);
        return Response::download($filepath);
    }



public function planDatas(Request $request){

  


     $plan = new Plan;
     $plan->did = $request->did;
     $plan->pid = $request->pid;
     $plan->docemail = $request->docmail;
     $plan->pname = $request->name;
     $plan->pmail = $request->email;
     $plan->plan = $request->editorData;
     $plan->save();
  /*
   $details = [
            'title' => 'Plan for '.$request->name.'',
            'body' => $plan->plan.'<br>'.session('user').'<br>'.session('email'),
        ];

                $pdf = PDF::loadView('email', $details);

   \Mail::to($request->email)->send(new \App\Mail\NotifyMail($details))->attachData($pdf->output(), "text.pdf");


*/


        $data["email"] = $request->email;
        $data["title"] = 'Plan for '.$request->name.'';
        $data["body"] = "Hi this <b><i>DR ".session('user')."</b></i> please find the attachment <br> Patient detail <br> Patient Name: <b>".$request->name."</b><br>Patent Address:".$request->address.",".$request->city.",".$request->state."<br>Contact:".$request->contact."<br><h3>Treatment Plan</h3><br>".$plan->plan."<br> Thanks & Regards,<br><b><i>Dr ".session('user')."</i></b><br><b><i>".$request->docmail."</i></b>";
  
        $pdf = PDF::loadView('myTestEmail', $data);
  
        Mail::send('myTestEmail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "plan.pdf");
        });
  
        //dd('Mail sent successfully');
     
    return redirect('plan/'.$request->pid);

}


}
