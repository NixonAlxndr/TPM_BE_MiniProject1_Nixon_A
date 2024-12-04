<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <title>Login</title>
</head>
<body>
    <div class = "register-banner barlow-semibold">
        @include('layout/navbar')
        <div class="inner register-form">
            <form action="{{route('Registration')}}" method = "POST" class="">
                <div class="login-register-title">
                    REGISTRATION
                </div>
                @csrf
                <div class ="user-name-register">
                    <p>User Name</p>
                    <input type="text" name="user_name" placeholder="Type your user name">
                </div>
                <div class="password-register">
                    <p>Password</p>
                    <input type="text" name="password" placeholder="Input your password">
                </div>
                <div class="email-register">
                    <p>Email</p>
                    <input type="text" name="email" placeholder="Input your email">
                </div>
                <button class="barlow-semibold">Submit</button>
                <div class="footer-form">
                    <p>Already have an account? <a href="{{route('Login')}}">Login Here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>