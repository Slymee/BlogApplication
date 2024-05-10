<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./Resources/css/login-register.css">
  @vite('resources/css/login-register.css')
  <title>Login & Registration</title>
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="{{ route('user-login') }}" method="post">
        @csrf
        <input type="text" placeholder="Enter your email or username" name="username_or_email" value="{{ old('username_or_email') }}">
        <input type="password" placeholder="Enter your password" name="password">
        <a href="#">Forgot password?</a>
        <input type="submit" class="button" value="Login">
        <span class="message-span">
            @if(session('message'))
                {{ session('message') }}
            @endif

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach                    
            @endif
        </span>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Signup</header>
      <form action="{{ route('user-register') }}" method="post">
        @csrf
        <input type="text" placeholder="Enter your name" name="name" id="" value="{{ old('name') }}">
        <input type="text" placeholder="Enter your username" name="username" id="" value="{{ old('username') }}">
        <input type="text" placeholder="Enter your email" name="email" value="{{ old('email') }}">
        <input type="password" placeholder="Create a password" name="password">
        <input type="password" placeholder="Confirm your password" name="password_confirmation">
        <input type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>