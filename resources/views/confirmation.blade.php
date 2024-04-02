<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirm</title>
        
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
        <style>
         
.thankyou-wrapper{
  width:100%;
  height:auto;
  margin: 5px auto;
  background:#ffffff; 
  /* padding:10px 0px 30px; */
}
.thankyou-wrapper h1{
  font:50px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  margin-top : 20px;
  /* padding:0px 5px 5px; */
}
.thankyou-wrapper p{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:5px 10px 10px;
}
.thankyou-wrapper a{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background: #e5a600;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #feb900;
}
.thankyou-wrapper a:hover{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background:#feb900;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #feb900;
}
</style>
        <link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
        <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
        <script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
        <link rel="stylesheet" href="https://unpkg.com/js-datepicker/dist/datepicker.min.css">
        <link href='https://fonts.googleapis.com/css?family=Anek Telugu' rel='stylesheet'>
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
      <li><a href="{{route('contact')}}">Contact</a></li>
      @if(Auth::check() && Auth::user()->isadmin==1)
        <li><a href = "{{route('view.appointment')}}">Administrator</a></li>
        @endif
        @if(Auth::check() && Auth::user()->isadmin==0)
          <li><a href = "{{route('appointment.date')}}"  class="active">Appointment</a></li>
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

        <!-- confirmation -->
        <section class="login-main-wrapper">
      <div class="main-container">
          <div class="login-process">
              <div class="login-main-container">
                  <div class="thankyou-wrapper">
                  <br><br>

                      <h1><img src="http://montco.happeningmag.com/wp-content/uploads/2014/11/thankyou.png" height="170px" alt="thanks" /></h1>
                        <p>for making an appointment, please arrive between 8AM - 6PM duing your scheduled date...</p>
                        <a href="{{route('home')}}" style="color: #fff;">Back to home</a>
                        <div class="clr"></div>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>

    <br><br>
    <br><br>
        <!-- end of confirmation -->
        @include('layouts.footer')
 
    </body>
</html>







<!-- <i class="fas fa-motorcycle navbar-icon"></i>
    <span class="navbar-text">Motorcycles</span>    -->










