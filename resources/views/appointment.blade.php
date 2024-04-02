<!DOCTYPE html>
<html>
<head>
    <title>Appointment</title>
    <link rel="stylesheet" href="{{asset('css/appointment.css')}}">
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

<!-- appointmentform -->

<div class="form-contain">
    <div class="image-container">
        <img src="{{ asset('images/home.jpg') }}" alt="Side Image">
    </div>
    <div class="form-container">
      <h2 style="text-align: center; color: #feb900;">My Appointment</h2>
      <form method="post" action="{{route('appointment.store')}}" class="form">
      @csrf
        @if ($errors->any())
            <div class="error">
                <br>
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <div class="form-row">
            <label for="vehicle" class="label">Type of Vehicle</label>
            <select id="vehicle" class="input-value" name="vehicle" required>
                <option value="" disabled selected>Select vehicle type</option>
                <option value="motorbike">Motorbike</option>
                <option value="scooter">Scooter</option>
                <option value="cycle">Cycle</option>
            </select>

        </div>
        <div class="form-row date-time">
          <div class="form-row">
            <label for="date" class="label">Date</label>
            <input type="text" name="date" style="width: 150px;" id="date" class="input-value" value="{{ $values['date'] }}" readonly required>
          </div>
          <div class="form-row" style="margin-left: 30px;">
            <label for="time" class="label">Time</label>
            <input type="text" name="time" style="width: 150px;" id="time" class="input-value" placeholder="Eg. 6 AM" pattern="(1|2|3|4|5|6|7|8|9|10|11|12)+ (AM|PM)" required>
          </div>
        </div>
        <div class="form-row">
          <label for="service" class="label">Type of Service</label>

            <select id="service" name="service" class="input-value" required>
                <option value="" disabled selected>Select Service Type</option>    
                @foreach($services as $service)

                <option value="{{ $service->services }}">{{$service->services}}</option>
                @endforeach 

            </select>

        </div>
        <div class="buttons-container" style="margin-left: 70px">
            <button type="submit" id="confirm_submit" class="button1" name="action" value="confirm" style=" margin-right: 20px;">Confirm</button>
            <button type="reset" class="button1" id="cancel" name="action" value="cancel">Cancel</button>
        </div>
      </form>
    </div>
  </div>
<!-- end of appointmentform -->

    @include('layouts.footer')
  <script>
    function validate(){
            vehicle = document.getElementById('vehicle').value;
            service = document.getElementById('service').value;

            if(vehicle == "none" || service == "none"){
                alert("Please select valid event type.");
                return false;
            }

        }
        $("document").ready( function (){
            $("#confirm_submit").on("click", function (evt) {
                let confirmation = confirm("Are you sure?");
                if (!confirmation) {
                    evt.preventDefault()
                }
            })
        })
  </script>
</body>
</html>
