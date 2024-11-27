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
        form{
            margin-left: 30px;
            margin-top: 20px;
        }
        div{
            margin-top: 10px;
            font-size: 1.2rem;
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
    <form action="{{route("createCulture")}}" method="POST">
        @csrf
        <div>
            <label for="Name">Name</label>
            <input type="text" name="Name" placeholder= "Culture Name...">
            @error('Name')
                <div>{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="Region">Region</label>
            <input type="text" name="Region" placeholder= "Region Name...">
            @error('Region')
                <div>{{$message}}</div>
            @enderror
        </div>
        <button>Submit your culture</button>
    </form>
    <a href="{{route("createTales")}}">Back</a>
</body>
</html>