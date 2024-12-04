<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Create Book</title>
</head>
<body>
    <div class="post-banner">
        @include('layout.navbar')
        <div class="inner outer-post">
            <form method="POST" action="{{route("Create.Book")}}" class="post-book" enctype="multipart/form-data">
                @csrf
                <div class="title-post post">
                    <p>Title</p>
                    <input type="text" name="Title" placeholder="Book Title...">
                </div>
                <div class="name-post post">
                    <p>Your Name</p>
                    <input type="text" name="AuthorName" placeholder="Your Name...">
                </div>
                <div class="desc-post post">
                    <p>Book Description</p>
                    <textarea name="Description" id="" placeholder="Description..."></textarea>
                </div>
                <div class="category=post post">
                    <p>Choose your category</p>
                    <select name="CategoryId" id="">
                        @foreach ($category as $c)
                            <option value="{{$c->id}}">{{$c->CategoryName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="image-post barlow-medium">
                    <p>Choose your image</p>
                    <input type="file" name="Image">
                </div>
                <button class="btn-submit barlow-semibold">Submit your book</button>
            </form>
            <div class="add-category flex barlow-medium">
                <p>Add category ?</p>
                <a href="{{route("Post.Category")}}">Add here!</a>
            </div>
        </div>
    </div>
</body>
</html>