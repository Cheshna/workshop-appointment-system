<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unavailable_dates;
use App\Models\Services;

use Illuminate\Support\Facades\Auth;
// use App\Models\User;

use Illuminate\Foundation\Auth\User as AuthUser;



class AdminController extends Controller
{
    public function dateView()
    {
        return view('admin_date');
    }

    public function serviceView()
    {
        return view('add_services');
    }

    public function dateStore(Request $request)
    {
        // dd($request);
        $userid = Auth::user()->id;
        $unavailable_dates = new unavailable_dates();
        $unavailable_dates->unavailable_date = $request->date;
        
        $unavailable_dates->save();
        return redirect()->route('admin.date');
    }
    public function serviceStore(Request $request)
    {
        // dd($request);
        // $userid = Auth::user()->id;
        $services = new Services();
        $services->services = $request->services;
        
        $services->save();
        return redirect()->route('view.appointment');
    }
    

}
