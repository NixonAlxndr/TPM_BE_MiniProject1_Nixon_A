<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
    <title>BookCollection</title>
</head>
<body>
    <div class="banner barlow-medium">
        @include('layout.navbar')
        
        <div class="outer home-container">
            <div class="inner intro">
            @if(session()->has('loginId'))
                    @php
                        $user = \App\Models\Registration::find(session('loginId'));
                    @endphp
                    <p class="welcome-message bncc pacifico-regular">Welcome</p>
                    <p class= "satisfy-regular book-collection">{{$user->user_name}}</p>
                @else
                    <p class="satisfy-regular bncc">BNCC</p>
                    <p class="pacifico-regular book-collection">Book Collection</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>