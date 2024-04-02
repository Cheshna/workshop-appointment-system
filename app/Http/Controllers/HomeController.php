<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function homeview(){
        return view('homepage');
    }
    public function loginView(){
        return view('login');
    }
    public function appointmentView(){
        return view('appointment');
    }

   
    public function servicesView(){
        return view('services');
    }
    public function calenderView(){
        return view('calendar');
    }

    public function aboutusView(){
        return view('aboutus');
    }
  
    public function contactView(){
        return view('contact');
    }
}
