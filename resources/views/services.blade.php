<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/services.css')}}">
        
        <title>Services</title>
   
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="{{asset('css/homenavbar.css')}}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="{{asset('css/aboutus.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/homenavbar.css')}}"> -->

    <link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>

</head>
<body>

<header id="header" class="header d-flex align-items-center" style="position: sticky; top:0;">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <img src="{{ asset('images/logo2.png') }}" alt="" style="width: auto; height: auto;">


     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}" style="text-decoration: none;">Home</a></li>
          <li><a href="{{route('aboutus')}}">About</a></li>
          <li><a href="{{route('services')}}"  class="active">Services</a></li>
          <li><a href="{{route('contact')}}">Contact</a></li>
          @if(Auth::check() && Auth::user()->isadmin==1)
            <li><a href = "{{route('view.appointment')}}">Administrator</a></li>
            @endif
            @if(Auth::check() && Auth::user()->isadmin==0)
              <li><a href = "{{route('appointment.date')}}">Appointment</a></li>
            @endif
        </ul>
      </nav><!-- .navbar -->



      @if(Auth::check() && Auth::user()->isadmin==1)
                <span class="topnav-right">
                <div class="dropdown">
                <a class="dropbtn scrollto" style="border: none;"><i class="fa fa-fw fa-user" style="float:left; margin-top: 4px;" ></i>&nbsp;{{Auth::user()->name}}</a>
                        <div class="dropdown-content" style="min-width: auto; margin-left: 1%; ">
                            <a href="{{route('admin.date')}}">Edit Dates</a>
                            <a href="{{route('admin.appointment')}}">Appointments</a>

                            <a href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                </span>
                @elseif(Auth::check() && Auth::user()->isadmin==0)
                <span class="topnav-right">
                    <div class="dropdown" style="border:none; cursor: pointer;">
                        <a class="dropbtn  scrollto"><i class="fa fa-fw fa-user" style="float:left; margin-top: 4px;" ></i>&nbsp;{{Auth::user()->name}}</a>
                        <div class="dropdown-content" style="min-width: auto; margin-left: 2%; ">
                         
                            <a href="{{route('edit')}}">Edit Profile</a>
                            <a href="{{route('appointment.status')}}">View Status</a>
                        <a href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                        
                </span>
               
                @else             
                    <span class="topnav-login">
                        <a href="{{route('login')}}"  class="get-started-btn scrollto">Login/Register</a>
                    </span>
                @endif   
                




      <!-- <a href="#about" class="get-started-btn scrollto">Login</a> -->
    </div>
  </header><!-- End Header -->


        
            <div class="container">
                <div class="title">
                    <h1 style="text-align: center; margin-top: 5%;"><font color="#8A191D">Our Services</font></h1>
                    <br/>
                    <center><hr width="50%" height="3px"></center>
                    <br/>

                </div>
                <div class="items" style="margin-top:5%">
                    <div class="item">
                        <div class="img">
                            <img src="{{asset('images/services/wash.png')}}" height="85px" width="75px">
                        </div>
                        <h5 style="margin-top: 10px;     
                                    font-family: 'Merriweather', serif;
                                    line-height: 1.3;
                                    font-weight: 500;
                                    font-size: 25px;
                                    color: #cc9c40;
                                    margin-bottom: 0.25rem;
                                    padding-bottom: 0.5rem;">Washing</h5>
                        <p>We offer a thorough exterior cleansing and drying, including meticulous wheel cleaning.</p>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="{{asset('images/services/service.png')}}" height="100px" width="80px">
                        </div>
                        <h5 style="font-family: 'Merriweather', serif;
                                    line-height: 1.3;
                                    font-weight: 500;
                                    font-size: 25px;
                                    color: #cc9c40;
                                    margin-bottom: 0.25rem;
                                    padding-bottom: 0.5rem;">Servicing</h5>
                        <p>One of the recommended routine maintenance measures you can implement.</p>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="{{asset('images/services/brakerepairs.png')}}" height="100px" width="80px">
                        </div>
                        <h5 style="font-family: 'Merriweather', serif;
                                    line-height: 1.3;
                                    font-weight: 500;
                                    font-size: 25px;
                                    color: #cc9c40;
                                    margin-bottom: 0.25rem;
                                    padding-bottom: 0.5rem;">Brake Repair</h5>
                        <p>We offer you thorough brake repair so that you can hit the brakes properly when required</p>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="{{asset('images/services/enginerepairs.png')}}" height="80px" width="80px">
                        </div>
                        <h5 style="margin-top: 20px; 
                                    font-family: 'Merriweather', serif;
                                    line-height: 1.3;
                                    font-weight: 500;
                                    font-size: 25px;
                                    color: #cc9c40;
                                    margin-bottom: 0.25rem;
                                    padding-bottom: 0.5rem;">Engine Repair</h5>
                        <p>We offer you thorough and good engine repair</p>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="{{asset('images/services/mobilchange.png')}}" height="100px" width="80px">
                        </div>
                        <h5 style="font-family: 'Merriweather', serif;
                                    line-height: 1.3;
                                    font-weight: 500;
                                    font-size: 25px;
                                    color: #cc9c40;
                                    margin-bottom: 0.25rem;
                                    padding-bottom: 0.5rem;">Oil Change</h5>
                        <p>Our goal is to make your vehicle run smoothly</p>
                    </div>
                    <div class="item">
                        <div class="img">
                            <img src="{{asset('images/services/tire.png')}}" height="70px" width="80px">
                        </div>
                        <h5 style="margin-top: 20px;
                                    font-family: 'Merriweather', serif;
                                    line-height: 1.3;
                                    font-weight: 500;
                                    font-size: 25px;
                                    color: #cc9c40;
                                    margin-bottom: 0.25rem;
                                    padding-bottom: 0.5rem;">Tire Repair</h5>
                        <p>Our aim is to return your vehicle to a safe and fully functional condition.</p>
                    </div>
                </div>
            </div>
       <br><br>
       @include('layouts.footer')
    </body>
</html>