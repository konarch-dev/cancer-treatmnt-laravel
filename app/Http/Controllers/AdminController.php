<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cancer;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

use App\Mail\NotifyMail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
        public function index()
    {
        return view('admin.login');
    }  
      
public function adminLogin(Request $request)
{

    $request->validate([
        'username' => 'required',
              'password' => 'required',
    ]);

    $doctor = DB::table('doctors')->paginate(5);
    if(($request->username=='admin')&&($request->password=='admin'))
    {
     //session('user','admin');

     session()->put('user', 'admin');


    return view('admin.dashboard',['doctor' => $doctor]);

    }
    else {
        
        return view('admin.login');
    }

}


public function adminLogout(Request $request)
{
$request->session()->flush();

    return redirect('adminlogin');


    }


    function showData($id){
           $data= Cancer::find($id);
           return view('admin.edit',['data'=>$data]);
       }


    function editData(Request $req){
           
        $data= Cancer::find($req->id);
        $data->type=$req->type;
        $data->save();
        return redirect('cancer');

       }


    function delData($id){
       DB::table('cancers')->where('id', $id)->delete();
        return redirect('cancer');
    }

    function addData(Request $req){
             

        $memberExists = Cancer::where('type', '=', $req->type)->first();
if ($memberExists === null) {

 $cancer=new Cancer();
        $cancer->type=$req->type;
        $cancer->save();

        return redirect('cancer');
}
else
{
            return view('admin.add',["msg"=>"<b>* Duplicate entry</b>"]);

}

    }

      

public function addDoctor(Request $request){

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'special' => 'required',
            
    ]);


        $memberExists = Doctor::where('email', '=', $request->email)->first();
if (($memberExists === null)&&($request->email != "")) {

     $doctor = new Doctor;
     $doctor->name = $request->name;
     $doctor->email = $request->email;
     $password=time().rand(1,100);
     $doctor->password = $password;
     $doctor->special = $request->special;
     $doctor->save();
   $details = [
            'title' => 'Login Credentials for '.$request->name.'',
            'body' => 'Please find your login credentials  <b>Email:</b>'.$request->email.',<br> <b>password:</b>'.$password.'',
        ];
   \Mail::to($request->email)->send(new \App\Mail\NotifyMail($details));
    return back()->with('success', 'Doctor has been added.');
}
else
{

    return back()->with('failure', 'Data already exist.');   
}

}


   function showDoctorData($id){
           $data= Doctor::find($id);

    $doctor = DB::table('cancers')->paginate(5);
           return view('admin.editDoctor',['data'=>$data,'doctor' => $doctor]);
       }


    function editDoctorData(Request $req){
           
        $data= Doctor::find($req->id);
        $data->special=$req->type;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->save();
        return redirect('doctor_list');

       }

    function delDoctorData($id){
       DB::table('doctors')->where('id', $id)->delete();
        return redirect('doctor_list');
    }
   
}
