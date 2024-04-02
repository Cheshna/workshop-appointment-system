<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{asset('/css/admin_date.css')}}"> -->
 
    <script>
        function disableDates() {
            var selectedDate = document.getElementById("date").value;
            var today = new Date().toISOString().split('T')[0];
            if (selectedDate < today) {
                document.getElementById("date").value = "";
                alert("Please select a valid date.");
            }
        }
   
    </script>
    <title>Edit Available Dates</title>



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
        <link rel="stylesheet" href="{{asset('css/appointment.css')}}">
        <link rel="stylesheet" href="{{asset('css/administration.css')}}">
        <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/homenavbar.css')}}"> -->

        <link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


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
          <li><a href = "{{route('appointment.date')}}">Appointment</a></li>
        @endif
    </ul>
  </nav><!-- .navbar -->



  @if(Auth::check() && Auth::user()->isadmin==1)
            <span class="topnav-right">
            <div class="dropdown" style="cursor: pointer;">
            <a class="dropbtn scrollto" style="border: none;"><i class="fa fa-fw fa-user" style="float:left; margin-top: 4px;" ></i>&nbsp;{{Auth::user()->name}}</a>
                    <div class="dropdown-content" style="min-width: auto; margin-left: 1%; ">
                    <style>
							.dropdown-content a:hover {
								color:black;
							}
						</style>
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

   <!-- choose date -->
   <center><h1 style="color: #8A191D; margin-top: 30px;">Choose Unavailable Date</h1>
    <br>
    <hr width="50%" height="3px"></center>



    <div class="form-contain" style="background-color: #fef8e5">
    <div class="image-container">
        <img src="{{ asset('images/pickdate.png') }}" alt="Side Image">
    </div>
    <div class="form-container">
      <h2 style="text-align: center; color: #8A191D;">Date Selection</h2>
      <form method="post" action="{{route('choosedate.admin')}}" class="form" id="chooseDate">
      @csrf
        <div class="date-picker" style="margin-top: 40px">
          <label for="date" class="label">Choose Date:</label>
          <input type="date" style="margin-top:10px; width:300px" class="input-value" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" onchange="disableDates()" required required>
        </div>


        <div class="buttons-container" style="margin-left: 70px; margin-top: 60px">
            <button type="submit" id="confirm_submit" class="button1" name="action" value="confirm" style=" margin-right: 20px;">Confirm</button>
            <button type="reset" class="button1" id="cancel" name="action" value="cancel">Cancel</button>
        </div>
      </form>
    </div>
  </div>



<!-- 
   <div class="container">
    <div class="image-container">
        <img src="{{asset('images/pickdate.png')}}" width="150px" height="150px" alt="Side Image">
    </div>
    <div class="form-container">
      <h2>Date Selection Form</h2>
      <form action="{{route('choosedate.admin')}}" method="post">
      @csrf

        <div class="date-picker">
          <label for="date">Choose Date:</label>
          <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" onchange="disableDates()" required required>
        </div>
        <br>
        <center><input type="submit" class="buttons" value="Add"></center>
          </form>
    </div>
  </div> -->

    <!-- <form action="{{route('choosedate.admin')}}" method="post">
        @csrf
            <label for="date">Choose a date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="date" name="date" id="date" min="<?php echo date('Y-m-d'); ?>" onchange="disableDates()" required>
            </label>
            <br/>
            <center><input type="submit" class="buttons" value="Add"></center>
        </form>
  -->
   
    @include('layouts.footer')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var confirmationForm = document.getElementById('chooseDate');
        
        confirmationForm.addEventListener('submit', function(event) {
            var confirmationMessage = "Are you sure you want to choose this date?";
            
            if (!confirm(confirmationMessage)) {
                event.preventDefault(); // Prevent form submission if user cancels
            }
        });
    });
</script>

</body>
</html>







  

