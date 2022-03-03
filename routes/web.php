<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FormValidtionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PDFController;

use App\Models\Cancer;
use App\Models\Doctor;
use App\Models\Plan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     $cancer = DB::table('cancers')->get();

    return view('patient.form', ['cancer' => $cancer]);
});


Route::get('/validate', function () {

    $cancer = DB::table('cancers')->get();

    return view('patient.form', ['cancer' => $cancer]);
});

Route::post('/form', [FormValidtionController::class, 'getData'])->name('form.index');


//Route::get('file', [FileController::class, 'create']); 
//Route::post('file', [FileController::class, 'store']);


Route::get('send-email', [FormValidtionController::class, 'index']);



Route::get('/cancer', function () {

    $cancer = DB::table('cancers')->paginate(5);

    return view('admin.cancer', ['cancer' => $cancer]);
});


Route::get('adminlogin', [AdminController::class, 'index']);


Route::post('dashboard', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::get('dashboard', function () {

    $doctor = DB::table('doctors')->paginate(5);
    return view('admin.dashboard', ['doctor' => $doctor]);
});


Route::get('logout', [AdminController::class, 'adminLogout']);

Route::get('delete/{id}',[AdminController::class,'delData']);

Route::get('edit/{id}',[AdminController::class,'showData']);
Route::post('edit/',[AdminController::class,'editData']);
Route::post('add/',[AdminController::class,'addData']);


Route::get('/addCancer', function () {
    return view('admin.add',["msg"=>"please enter cancer type"]);
});


Route::get('/doctor', function () {

    $cancer = DB::table('cancers')->get();

    return view('patient.doctor', ['cancer' => $cancer]);
});



Route::post('/doctor', [AdminController::class, 'addDoctor'])->name('form.doctor');




Route::get('/doctor_list', function () {

    $doctor = DB::table('doctors')->paginate(5);

    return view('admin.doctor', ['doctor' => $doctor]);
});


Route::get('editDoctor/{id}',[AdminController::class,'showDoctorData']);
Route::post('editDoctor/',[AdminController::class,'editDoctorData']);
Route::get('deleteDoctor/{id}',[AdminController::class,'delDoctorData']);


Route::post('/doctorlogin', [DoctorController::class, 'doctorLogin'])->name('doctor.login');

Route::get('/doctorlogin', [DoctorController::class, 'index']);



Route::get('docDashboard', function () {

    return view('/enquiry');
});

Route::get('/demo', [DoctorController::class, 'showData']);


Route::get('enquiry', [DoctorController::class, 'showData'])->name('doctor.enquiry');


Route::get('doctorlogout', [DoctorController::class, 'doctorLogout']);


Route::get('plan/{id}',[DoctorController::class,'planData']);
Route::post('chksave',[DoctorController::class,'chksave']);
Route::get('/downloadfile/{file}',[DoctorController::class,'downloadfile']);
Route::post('/addPlan',[DoctorController::class,'planDatas']);

Route::get('send-email-with-pdf', [PDFController::class, 'index']);
