<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign up</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="wrapper">
    <form action="{{route('signup')}}" method="post">
      @csrf
      <h2>Welcome</h2>
        <div class="input-field">
        <input type="text" id="name" name="name" autocomplete="off" required>
        <label>Enter Fullname</label>
      </div>


	  <div class="input-field">
        <input type="text" id="email" name="email" autocomplete="off" required>
        <label>Enter Email ID</label>
      </div>

	  <div class="input-field">
        <input type="text" id="user" name="user" autocomplete="off" required>
        <label>Enter Username</label>
      </div>

      <div class="input-field">
        <input type="password" id="password" name="password" autocomplete="off" required>
        <label>Enter password</label>
      </div>

	  <div class="input-field">
        <input type="text" id="contact" name="contact" autocomplete="off" required>
        <label>Enter Contact Number</label>
      </div>


      <button type="submit">Sign Up</button>
      <div class="register">
        <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("username").value = "";
      document.getElementById("password").value = "";
    });
  </script>
</body>
</html>