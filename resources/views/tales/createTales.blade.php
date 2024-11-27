<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input{
            padding: 5px;
            border: none;
        }
        input:focus{
            outline:none;
            border-bottom: 1px solid #000;
        }
        button{
            font-size: 1rem;
            color: white;
            margin-top: 10px;
            padding-inline: 1.5em;
            padding-block: 1em;
            outline: none;
            border: none;
            background-color: #78d3fb;
            border-radius: 8px;
            scale: 1;
            transition: background-color 0.2s ease-in-out, scale 0.2s ease-in-out;
        }
        button:hover{
            background-color: #1983b1;
            scale: 1.05
        }
    </style>
</head>
<body>
    <form action="{{route("createTales")}}" method="POST" style="margin-left: 20px; margin-top: 20px; font-size:1.3rem;">
        @csrf
        <div style ="margin-top: 5px">
            <label for="">Title: </label>
            <input type="text" placeholder="Title.." name = "Title" >
            @error('Title')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div style ="margin-top: 5px">
            <label for="">Summary: </label>
            <input type="text" placeholder="Summary.." name = "Summary" value="none" >
        </div>
        <div style ="margin-top: 5px">
            <label for="">Type: </label>
            <input type="text" placeholder="Type.." name = "Type" value="none">
        </div>
        
        <div style ="margin-top: 5px">
            <label for="">Culture: </label>
            <select name="CultureId" style="padding: 5px;">
                @foreach($culture as $c)
                    <option value="{{$c->id}}">{{$c->Name}}, {{$c->Region}}</option>
                @endforeach
            </select>
            @error('CultureId')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button>Submit your tales</button>
    </form>
    <a href="{{route('culture.createCulture')}}">Didnt see your region? Make one</a>
    <br>
    <a href="{{route('getTales')}}">Back to see tales</a>

</body>
</html>