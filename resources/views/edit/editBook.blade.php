<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <title>Edit Book</title>
    <style>
        .title-post{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="post-banner barlow-medium">
        @include('layout.navbar')
        <div class="inner outer-post">
            <h1>Edit Book</h1>
            <form method="post" action="{{route('Update.Book', ["book" => $book])}}" class="post-book" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="title-post post">
                    <p>Title</p>
                    <input type="text" name="Title" placeholder="Book Title..." value="{{$book->Title}}">
                </div>
                <div class="name-post post">
                    <p>Your Name</p>
                    <input type="text" name="AuthorName" placeholder="Your Name..." value="{{$book->AuthorName}}">
                </div>
                <div class="desc-post post">
                    <p>Book Description</p>
                    <textarea name="Description" id="" placeholder="Description..." >{{$book->Description}}</textarea>
                </div>
                <div class="category=post post">
                    <p>Choose your category</p>
                    <select name="CategoryId" id="">
                        @foreach ($category as $c)
                            <option value="{{$c->id}}">{{$c->CategoryName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="image-post">
                    <p>Choose your image</p>
                    <input type="file" name="Image" value="{{$book->Image}}">
                </div>
                <button class="btn-submit barlow-semibold">Submit your book</button>
            </form>
            <div class="add-category flex">
                <p>Add category ?</p>
                <a href="{{route("Post.Category")}}">Add here!</a>
            </div>
        </div>
    </div>
</body>
</html>