<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-banner register-banner barlow-semibold">
        @include('layout.navbar')
        <div class="inner register-form">
            <form action="{{route('Authentication')}}" method="POST">
                @csrf
                <p class="login-register-title">LOG IN</p>
                @if(Session::has('fail'))
                    <p class="error">{{Session::get('fail')}}</p>
                @endif
                <div class = "login-user-name user-name-register">
                    <p>User Name</p>
                    <input type="text" name="user_name" placeholder="User Name">
                    @error('user_name')
                        <div>Error</div>
                    @enderror
                </div>
                <div class ="login-password password-register">
                    <p>Password</p>
                    <input type="text" name="password" placeholder="Password">
                    @error('password')
                        <div>Error</div>
                    @enderror
                </div>
                <div class ="email-password password-register">
                    <p>Email</p>
                    <input type="text" name="email" placeholder="Email">
                    @error('email')
                        <div>Error</div>
                    @enderror
                </div>
                <button>Submit</button>
                <div class="footer-form">
                    <p>Dont have an account? <a href="{{route('Register')}}">Regsiter Here</a> </p> 
                </div>
            </form>
        </div>
    </div>
</body>
</html>