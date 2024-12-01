<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Create Category</title>
</head>
<body>
    <div class="post-banner">
        @include('layout/navbar')
        <div class="inner outer-post">
            <form action="{{route("Post.Category")}}" method="POST" class="">
                @csrf
                <div class="post">
                    <p>Make your own category</p>
                    <input type="text" name="CategoryName" placeholder="Your category...">
                </div>
                <button class="btn-submit">Submit your category</button>
            </form>
        </div>
    </div>
</body>
</html>