<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Status;
use App\Models\Services;


use Illuminate\Foundation\Auth\User as AuthUser;


class UserController extends Controller
{
    public function loginView(){
        return view('login');
    }
     public function signupView(){
        return view('register');
    }

    public function dateView(){
        return view('admin_date');
    }

    public function edit()
    {
        // $user = User::all();
        $user = Auth::User();
        return view('edit_user', compact('user'));
    }
    public function appointmentInfo()
    {
        $appointments = Appointment::with('user');
        if (!Auth::user()->isadmin) {
            $appointments->where('user_id', Auth::user()->id);
        }
        // $appointments = $appointments->latest()->get();
        $appointments = Appointment::orderByRaw("CASE 
        WHEN status = 'pending' THEN 1
        WHEN status = 'ongoing' THEN 2
        WHEN status = 'completed' THEN 3
        ELSE 4
        END")->get();
        $services = Services::all();
        return view('view_appointment', compact('appointments','services'));
    }


    public function allAppointment()
    {
        $appointments = Appointment::with('user');
        if (!Auth::user()->isadmin) {
            $appointments->where('user_id', Auth::user()->id);
        }
        // $appointments = $appointments->latest()->get();
        $appointments = Appointment::orderByRaw("CASE 
        WHEN status = 'pending' THEN 1
        WHEN status = 'ongoing' THEN 2
        WHEN status = 'completed' THEN 3
        ELSE 4
        END")->get();
        return view('all_appointments', compact('appointments'));
    }


    public function serviceInfo(){
        $services = Services::all();
        return view('view_appointment', compact('services'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string',
            'email'=>'required|email:filter',
            'user'=> 'required|string',
            'password'=>'required|between:6,10',
            'contact'=> 'required|string',
        ]);
        $userid = Auth::user()->id;
        $user = User::find($userid);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user = $request->input('user');
        if(isset($request->password)){
            $user->password = bcrypt($request->password);
        }
        $user->contact = $request->input('contact');
        $user->save();
        return redirect()->route('home')->with('success', 'Profile updated successfully.');
        // dd($request);
    }

    public function store(Request $request)
    {
        // dd($request);
        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->user = $request->user;

        $newUser->password = bcrypt($request->password);
        if (isset($request->isAdmin)){
            $newUser->isAdmin = $request->isAdmin;
        }
        $newUser->contact = $request->contact;
        $newUser->save();
        return redirect()->route('login');
    }


    public function verifyLogin(Request $request){
        $credentials = ($request->except('_token'));
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        else{
            return redirect()->route('login');
        }
    }

    // YourController.php

    public function appointmentView()
    {
        // Fetch the unavailable dates from the database or any other storage mechanism
        // $unavailableDates = DB::table('unavailable_dates')->pluck('unavailable_date')->toArray();
        // $appointments = Appointment::pluck('date_column')->toArray();
        // return View::make('appointments')->with('appointments', $appointments);

        return view('appointment');
    }

    public function storeAppointment(Request $request)
    {
        dd($request);
        // $appointments = new Appointment();
        // $appointments->vehicle = $request->vehicle;
        // $appointments->date = $request->input('dates');
        // $appointments->time = $request->time;
        // $appointments->service = $request->service;
        // $appointments->save();


        $selectedDates = $request->input('dates');

        // Perform necessary operations with the selected dates

        // return redirect()->back()->with('success', 'Form submitted successfully.');
    }

    public function logout(Request $request){
        Auth::logout();
         $request->session()->invalidate();
         return redirect()->route('home');

     }
     public function updateStatus(Request $request, Appointment $appointment)
     {
         // Update the column value in the database
         $appointment->status = $request->input('status');
         $appointment->save();
         // Redirect or return a response as needed
         return redirect()->route('admin.appointment');
     }
     public function destroy()
    {
        //
        $user = User::find();
        $user->delete();
        return redirect()->back();
    }

}
