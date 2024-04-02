<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;

use Symfony\Component\Routing\RouteCollectionBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('project.homepage');
// });

Route::get('/home',[HomeController::class,'homeview'])->name('home');
Route::get('/nav', function () {
    return view('layouts.navbar');
});

//Login
Route::get('/login',[UserController::class,'loginView'])->name('login');
Route::post('login-verification',[UserController::class,'verifyLogin'])->name('verify');
Route::get('register-account',[UserController::class,'signupView'])->name('register');
Route::post('sign-up',[UserController::class,'store'])->name('signup');
Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('/user/edit',[UserController::class,'edit'])->name('edit');
Route::post('/user/update',[UserController::class,'update'])->name('update.user');

//
// Route::get('/appointment',[HomeController::class,'appointmentView'])->name('appointment');
Route::get('/services',[HomeController::class,'servicesView'])->name('services');
Route::get('/calender',[HomeController::class,'calenderView'])->name('calender');

Route::get('/home/aboutus',[HomeController::class,'aboutusView'])->name('aboutus');
Route::get('/home/contact',[HomeController::class,'contactView'])->name('contact');


//Admin
Route::get('/date', [AdminController::class,'dateView'])->name('admin.date');
Route::get('/admin/services', [AdminController::class,'serviceView'])->name('admin.services');

Route::post('/choose-date',[AdminController::class,'dateStore'])->name('choosedate.admin');
Route::post('/admin/add-services',[AdminController::class,'serviceStore'])->name('addService.admin');

Route::get('/admin/view-appointment',[UserController::class,'appointmentInfo'])->name('view.appointment');
Route::get('/admin/view-all-appointment',[UserController::class,'allAppointment'])->name('admin.appointment');

Route::post('/admin/user/delete/',[UserController::class,'destroy'])->name('delete.user');
Route::get('/admin/user/update/status/{appointment}',[UserController::class,'updateStatus'])->name('update.status');

//customer Appointment
// Route::get('/user-appointment', [UserController::class,'appointmentView'])->name('user.appointment');
// Route::post('/user-appointment',[UserController::class,'storeAppointment'])->name('appointment.date');


// Route::get('/admin/date', [AdminController::class,'viewDates'])->name('admin.date');
// Route::post('/admin/submit', [AdminController::class,'submit'])->name('admin.submit');

//customer Appointment
Route::get('/user/checkappointment',[AppointmentController::class,'checkDate'])->name('appointment.date');
Route::get('/user/appointment',[AppointmentController::class,'checkAvailable'])->name('appointment.available');
Route::get('/user/appointment/status',[AppointmentController::class,'viewStatus'])->name('appointment.status');
Route::post('/user/appointment/verify',[AppointmentController::class,'verifyAppointment'])->name('appointment.verify');
Route::get('/user/appointment/confirm',[AppointmentController::class,'confirmAppointment'])->name('confirm');
Route::post('/user/appointment/store',[AppointmentController::class,'store'])->name('appointment.store');
Route::get('/user/appointment/delete/{appointment}',[AppointmentController::class,'delete'])->name('appointment.delete');


// Route::get('/confirm', function () {
//     return view('confirmation');
// });
