<div class="outer navbar-outer">
    <div class= "navbar inner barlow-medium">
        <div class ="logo barlow-semibold">
            @if (Session::has('loginId'))
                @php
                    $user = \App\Models\Registration::find(session('loginId'));
                @endphp
                <p>{{$user->role}}</p>
            @else
                <p>TPM</p>
            @endif
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/book-collection">Book Collection</a></li>
            @if(Session::has('loginId'))
                @php
                    $user = \App\Models\Registration::find(session('loginId'));
                @endphp
                @if($user->role === 'Creator')
                    <li><a href="/add-book">Post Book</a></li>
                @endif
            @endif
        </ul>
        <div>
            @if(Session::has('loginId'))
                <a href="{{route('Logout')}}" class="login">Logout</a>
            @else
                <a href="/login" class="login">Login</a>
            @endif
        </div>
    </div>
</div>