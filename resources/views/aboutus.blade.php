<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About US</title>

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
          <li><a href="{{route('aboutus')}}" class="active">About</a></li>
          <li><a href="{{route('services')}}">Services</a></li>
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
                <a class="dropbtn get-started-btn scrollto" style="border: none;"><i class="fa fa-fw fa-user" style="float:left; margin-top: 4px;" ></i>&nbsp;{{Auth::user()->name}}</a>
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

    <!-- <header class="title">
        <h1>About Us</h1>
        <hr>
    </header> -->
    <!-- <img src="{{asset('images/loginbg.jpg')}}" alt=""> -->

    <center><h1 style="color: #8A191D; margin-top: 30px;">About US</h1>
    
    <hr width="50%" height="3px"></center>


<main id="content">
        <section class="content-section">
            <div class="left">
                <h3 style="color: #cc9c40">Bhimsen Motorcycle Workshop</h3>
                <hr style="border: none;
            border-top: 2px solid #cc9c40; /* You can change the color and thickness */
            margin: 10px 0;
            background-color: #cc9c40;
            width: 10%;">
                <p>“Bhimsen Motorcycle Workshop” is an organization established in 1st Asar, 2057. 
                    This workshop has been operating for the past 22 years.
                    This workshop is located in Ramghat Marg, Bhimsensthan. 
                    This workshop is specialized in motorcycle servicing, engine repair, brake repair, and so on. It has sufficient stock of necessary tools and equipment to perform repair and maintenance. </p>
            </div>
            <div class="right">
                <img id="image" src="{{asset('images/aboutus.jpg')}}" alt="">
            </div>
        </section>
<br>

  
</main>


        <!-- Template Main JS File -->
      
        @include('layouts.footer')   

</body>
</html>