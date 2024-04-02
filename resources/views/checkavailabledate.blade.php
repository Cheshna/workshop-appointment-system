<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choose the Date</title>

    <link rel="stylesheet" href="{{asset('css/checkdate.css')}}">
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
<body onLoad="enaButton()">

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
    

    <main>
        <div class="main-section">
            <div class="picture">
                <img src="{{asset('images/loginback.jpg')}}" alt="" style="height: 100%;">
            </div>
            <div class="dform">
                <form action="{{route('appointment.available')}}" method="get">
                    @csrf
                    <div class="date-container">
                        <div class="book-title">Choose Your Appointment Date</div> 
                        {{-- <div>Check to see if the date you need is available or not.</div> --}}
                        <div class="date-form">
                            {{-- <span class="date-title">Date:</span> --}}
                            <input type="text" name="date" id="datepick" placeholder="Date" value="{{old('date')}}" required>
                            <button type="submit" name="avail" value="available" class="button"><span>Check availability</span></button>
                            @if($errors->any())
                                <span class="availability" id="ava" style="visibility: visible; color: white;">{{$errors->first()}}</span>
                            @else
                                <span class="availability">Busy</span>
                            @endif
                            <div class="button1">
                                <button type="submit" name="avail" value="confirmation" id="con" disabled>Next</button>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            
        </div>
    </main>
    @include('layouts.footer')
    <script src="https://unpkg.com/js-datepicker"></script>
    <script>
        const picker = datepicker('#datepick', {
            customDays: ['S','M','T','W','Th','F','Sa'],
            minDate: addDays(new Date()),
            maxDate: addMonth(new Date()),
            startDate: new Date(),
        }
        )
        function addDays(date){
            date.setDate(date.getDate() + 2);
            return date;
        }
        function addMonth(date){
            date.setDate(date.getDate()+ 60);
            return date;
        }
    </script>
    <script>
        function enaButton(){
            // alert("hello");
            b = document.getElementById("con");;
            // b.removeAttribute('disabled');
            a = document.getElementById('ava').innerText;
            
            if (a == 'Available'){
                b.removeAttribute('disabled');
            }
        }
        window.onload = enButton;
        
    </script>
</body>
</html>