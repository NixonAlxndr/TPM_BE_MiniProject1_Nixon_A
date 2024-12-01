<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    <div>
        @include('layout.navbar')
    <form action="{{route('Authentication')}}" method="POST">
        @csrf
        <div>
            <p>User Name</p>
            <input type="text" name="user_name" placeholder="User Name">
            @error('user_name')
                <div>Error</div>
            @enderror
        </div>
        <div>
            <p>Password</p>
            <input type="text" name="password" placeholder="Password">
            @error('password')
                <div>Error</div>
            @enderror
        </div>
        <button>Submit</button>
    </form>
    </div>
</body>
</html>