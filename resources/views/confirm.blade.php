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
        <title>Confirmation</title>
        <style>
            body, html {
                background-color: black;
            height: 100%;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            }

            * {
            box-sizing: border-box;
            }
            img {
   
                display: inline-flex;
                width: 30%;
                height: 74.5vh;
                float: right;
                
                /* margin: 0;
                padding: 0; */
            }
.confirm-button {
    background-color: #ff4500;
    border: 2px solid white;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 10px;
}
  

  .cancel-button {
    background-color: #ff4500;
    border: 2px solid white;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
  }
  
.container form {
    margin-left: 20vh;
}

.submit_btn {
    background: #ff4500 !important;
    color: white !important;
    padding: 15px;
    /* margin-left: 15%; */
    margin-top: 4vh; 
    
    border-radius: 5px;
    border: 1px solid black;
    font-size: 15px;
}
.buttons{
    justify-content: space-between;
}
               
                .footer {
                    font-family: Arial, Helvetica, sans-serif;
                   
                    /* margin-top: 6%; */
                    padding: 20px; /*Some padding*/
                    text-align: center; /* Center text*/
                    background: #222223; /* Grey background */
                    height: 9.5%;/*optional*/
                    margin-top: 20.2%;
                }
                
                .footer-info {
                    /* font-family: century 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; */
                    display: block;
                    color: white;
                    line-height: 1.5;
                    text-align: center;
                }
                
                .footer-info a{
                    /* font-family: century 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; */
                    color: white;
                    text-decoration: none;
                }

        </style>
    </head>
    <body>
        
        @include('layouts.navbar')
       
        <img src="{{asset('images/appoint.jpg')}}" alt="">

    
<div class="container">
    <h2 style="margin-bottom: 6vh; margin-top: 10vh; color: white; text-align: center;">Are you certain you want to proceed?</h2>
        <form method="post" action="{{route('appointment.store')}}">
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
            
            <div class="buttons"><center>
                            <button type="submit" class="submit_btn" name="action" value="confirm">Confirm</button>
                            
                        </center>
            </div>
            
        </form>
    </div>

        <footer class="footer">
            <div class="footer-info">
                Copyright © 2023 Bhimsen Motorcycle Workshop. All Right Reserved.<br/>
            </div>
        </footer>            
        
    </body>
</html>







<!-- <i class="fas fa-motorcycle navbar-icon"></i>
    <span class="navbar-text">Motorcycles</span>    -->










