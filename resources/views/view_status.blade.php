<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>


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


<!-- status check -->
<div class="text-1">My Status</div>
                <div class="table-responsive">
                <table class="table table-hover table-sm bl" style="margin-left:15%; width:70%; background-color:#fff">
                    <thead class=" thead-dark">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Date</th>
                        <th scope="col">Service</th>
                        <th scope="col">Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $user)
                                <tr>
                                    <td><form action="{{route('delete.user')}}" method="POST" onsubmit="return confirmDel()">
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                    </form></td>
                                    <th scope="raw">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->contact}}</td>
                        @endforeach
                        @foreach($appointments as $appoint)
                                    <td>{{$appoint->vehicle}}</td>
                                    <td>{{$appoint->date}}</td>
                                    <td>{{$appoint->service}}</td>
                        
                                    <td><form action="{{ route('update.status') }}" method="POST">
                                        @csrf
                                            <input type="text" name="status" value="{{ $appoint->status }}">
                                            <button type="submit">Update</button>
                                        </form></td>
                        @endforeach
                        
                                </tr>
                            </tbody>
                    </table>
                </div>
                <br><br>
                <br><br>
</body>
</html>