<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <div class="wrapper">
    <form action="{{ route('verify') }}" method="post">
      @csrf
      <h2>Welcome Back</h2>
        <div class="input-field">
        <input type="text" id="username" name="user" autocomplete="off" required>
        <label>Enter your username</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" autocomplete="off" required>
        <label>Enter your password</label>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="{{route('register')}}">Register</a></p>
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