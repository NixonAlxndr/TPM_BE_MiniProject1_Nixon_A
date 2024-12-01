<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>
<body>
    @include('layout/navbar')
    <form action="{{route('Registration')}}" method = "POST">
        @csrf
        <div>
            <p>UserName</p>
            <input type="text" name="user_name" placeholder="User Name">
        </div>
        <div>
            <p>Password</p>
            <input type="text" name="password" placeholder="Password">
        </div>
        <button>Submit</button>
    </form>
</body>
</html>