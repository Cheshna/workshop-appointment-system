<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Home</title>
   
</head>
<body>

    <div class="bg-image"></div>
    @include('layouts.navbar')
        
        
    <div class="container" id="bg-text" style="margin-top: 10%">
        <h2 style="margin-bottom: 10vh">"Book Your Motorcycle Appointment Today"</h2>
        <button class="appointment-btn" id="centered-btn">Make an Appointment</button>
    </div>
        
        
             
    <footer>
        <p>Bhimsen Motorcycle Workshop</p>
    </footer>

</body>
</html> -->


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Remove default favicon -->
        <link rel="icon" href="data:,">

        <title>Home</title>
        
<!-- In the <head> section of your HTML file -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

        <link href="{{asset('css/homenavbar.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    <!-- Unicons -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />



    </head>
    <body>

        <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <img src="{{ asset('images/logo2.png') }}" alt="">


     
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}" class="active" style="text-decoration: none;">Home</a></li>
          <li><a href="{{route('aboutus')}}">About</a></li>
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
                <span class="topnav-right" style="margin-right: 3vh">
                <div class="dropdown">
                <a href="#"  class="dropbtn get-started-btn scrollto"><i class="fa fa-fw fa-user" style="float:left; margin-top: 4px;" ></i>&nbsp;{{Auth::user()->name}}</a>
                        <div class="dropdown-content" style="min-width: auto; margin-left: 1%; ">
                            <a href="{{route('admin.date')}}">Edit Dates</a>
                            <a href="{{route('admin.appointment')}}">Appointments</a>

                            <a href="{{route('logout')}}">Logout</a>
                        </div>
                    </div>
                </span>
                @elseif(Auth::check() && Auth::user()->isadmin==0)
                <span class="topnav-right">
                    <div class="dropdown" style="cursor: pointer">
                        <a class="dropbtn get-started-btn scrollto"><i class="fa fa-fw fa-user" style="float:left; margin-top: 4px;" ></i>&nbsp;{{Auth::user()->name}}</a>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

    <div class="info d-flex align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <h2 data-aos="fade-down" style="font-size: 45px;">Welcome To <div class="describe" style="  font-family: 'Georgia', serif;">Bhimsen Motorcycle Workshop</div></h2>
            <p data-aos="fade-up">Your trusted destination for comprehensive motorcycle repair and maintenance services. From routine tune-ups to complex repairs, our skilled technicians ensure your bike stays in top-notch condition for a smooth ride.</p>
            
            @if(Auth::check() && Auth::user()->isadmin==0)
            <a data-aos="fade-up" data-aos-delay="200" href="{{route('appointment.date')}}" class="btn-get-started glow-button" style="letter-spacing: 0;">Make your Appointment Now</a>
          
            @elseif(Auth::check() && Auth::user()->isadmin==1)
            <a data-aos="fade-up" data-aos-delay="200" href="{{route('view.appointment')}}" class="btn-get-started glow-button" style="letter-spacing: 0;">Make your Appointment Now</a>
            
            @else
            <a data-aos="fade-up" data-aos-delay="200" href="{{route('login')}}" class="btn-get-started glow-button" style="letter-spacing: 0;">Make your Appointment Now</a>
            
            @endif

          </div>
        </div>
      </div>
    </div>

    

      <div class="carousel-item active" style="background-image: url(images/back1.jpg)"></div>
      

      

  </section><!-- End Hero Section -->
      


  





        

         <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script> 

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script src="{{ asset('js/login.js') }}"></script>

    </body>
</html>







<!-- <i class="fas fa-motorcycle navbar-icon"></i>
    <span class="navbar-text">Motorcycles</span>    -->










