<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('tales.createTales')}}">Make your own tales</a>
    <h1>Tales</h1>
    @foreach($tales as $t)
        <div style="border-style:solid; border-color: #234; border-radius:10px; padding:10px; margin-top: 5px;">
            <h2>{{$t->Title}}</h2>
            <h3>{{$t->Type}}</h3>
            <p>{{$t->Summary}}</p>
            <p>Dari {{$t->culture->Name}}, {{$t->culture->Region}}</p>
        </div>
    @endforeach
</body>
</html>