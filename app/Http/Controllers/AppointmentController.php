<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Services;

use App\Models\unavailable_dates;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    public function viewStatus()
    {
        $appointments = Appointment::with('user');
       

        if (!Auth::user()->isadmin) {
            $appointments->where('user_id', Auth::user()->id);
        }
        $appointments = $appointments->latest()->get();

        return view('view_appointment_status', compact('appointments'));
    }

    public function store(Request $request)
    {
        // $values = $request->except('_token');
        $button = $request->action;
        switch ($button){
            case 'confirm':
                $validated = $request->validate([
                    'vehicle' => 'required|string',

                    // 'time'=>['required','regex:/^[1-12]+ AM|[1-12]+ PM/'],
                    'time' => ['required','regex:/^(1|2|3|4|5|6|7|8|9|10|11|12)+ (AM|PM)/'],
                    // [1-12]+ AM|[1-12]+ PM
                    'service' => 'required|string',

                ]);
                $values = $request->except('_token');
                $date = date('Y-m-d', strtotime($request->date));
                $vehicle = $request->vehicle;
        
                $service = $request->service;

                // ="";
                if($vehicle == "none" || $service == "none"){
                    // return view('booking.form',compact('date','values'))->withErrors(["Invalid event"]);
                    return back()->withInput()->withErrors("Invalid Type");
                }

                // $servicename = $request->event;
                // $package = $request->package;
                // $serv = Service::where('service_name',$servicename)->where('package',$package)->first();
                $appointment = new Appointment();
                $appointment->vehicle = $vehicle;
                $date = date('Y-m-d',strtotime($request->date));
                $appointment->date = $date;
                $appointment->time = date('H:i:s', strtotime($request->time));
                $appointment->service = $service;
                $user = User::find($request->id);
                $appointment->user_id = Auth::user()->id;
                $appointment->status = $request->status ?? 'pending';

                $appointment->save();
                return view('confirmation');
            case 'cancel':
                return redirect()->route('appointment.date');
        }


    }
    public function checkDate(){
        // $status="Busy";
        return view('checkavailabledate');
    }

    public function checkAvailable(Request $request){
        if($request->avail == "available"){
            $date = $request->date;
            $reqdate = date('Y-m-d',strtotime($date));
            $appointment = Appointment::where('date',$reqdate)->count();
            $unavailable = unavailable_dates::where('unavailable_date',$reqdate)->count();
            $values = ($request->except('_token'));
            // dd($values);
            $status= "Busy";

            if($appointment<6 && $unavailable == null){
                $status = "Available";

                // return view('book',compact('values'));
                // return view('checkdate',compact('status'));
                return redirect()->back()->withInput()->withErrors(['status'=>'Available']);
            }
            else{
                // return redirect()->route('booking.date');
                $status = "Unavailable";
                // dd($booking);
                // return back()->withInput();
                return redirect()->back()->withInput()->withErrors(['status'=>'Unavailable']);
            }
            // return view('checkdate',compact('status'));
            // return redirect()->back()->withInput()->withErrors(['status'=>'Available']);
            // dd($reqdate);
       }
        else{
            $values = ($request->except('_token'));
            $services = Services::all();
            // dd($services);
            return view('appointment',compact('values','services'));
        }

    }

    public function verifyAppointment(Request $request){

        // $booking = Booking::where('date',$reqdate)->count();

        // dd($values);
        // else{
        //     $st = $request->stime;
        //     $et = $request->etime;

        //     $time = $st + " to " + $et;
        // }
        // dd($date, $type, $package, $wholeday,$st,$et,$num,$loc);
//         dd($values);
        return view('confirm');

    }
    public function update(Request $request)
    {
        $appointmentid = $request->appointmentid;
        $button = $request->change;
        $appoint = Appointment::find($appointmentid);
        switch ($button){
            case 'confirm':
                // $book = Booking::where('id',$bookingid)->first();
                $appoint->status = "Confirmed";
                $appoint->save();
                return redirect()->route('view.appointment')->withErrors(['msg'=>'Confirmed.']);
                // dd($book);
                // break;
            case 'delete':
                $appoint->delete();
                return redirect()->route('view.appointment')->withErrors(['msg'=>'Deleted.']);
                // break;
            case 'complete':
                $appoint->status = "Completed";
                $appoint->save();
                return redirect()->route('view.appointment')->withErrors(['msg'=>'Completed.']);
                // break;
        }
    }

    public function confirmAppointment(){
        return view('confirm');
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('admin.appointment');
    }
}
