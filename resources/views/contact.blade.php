<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
          <li><a href="{{route('services')}}">Services</a></li>
          <li><a href="{{route('contact')}}"  class="active">Contact</a></li>
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


    <main>
        <section class="inform">
        <center><h1 style="color: #8A191D;">Contact Information</h1>
    
        <hr width="50%" height="3px"></center>
<br>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.483501508638!2d85.30258769999999!3d27.7023542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb185831c29e83%3A0xaddd8154fc96847f!2sBhimsen%20Bike%20Wash!5e0!3m2!1sen!2snp!4v1686322456737!5m2!1sen!2snp" width="400" height="300" style="border:0; float: right;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <ul class="contact-info">
                <li>
                    <i class="fa fa-map-marker"></i>
                    <span>Ramghat Marg, Bhimsensthan, Kathmandu, Nepal</span>
                </li>
                <li>
                    <i class="fa fa-phone"></i>
                    <span>+977 9841234567 </span>
                </li>
                <li>
                    <i class="fa fa-envelope"></i>
                    <span>bhimmotor@gmail.com</span>
                </li>
            </ul>
        </section>
    </main>
  <br><br>
    @include('layouts.footer')
</body>
</html>
