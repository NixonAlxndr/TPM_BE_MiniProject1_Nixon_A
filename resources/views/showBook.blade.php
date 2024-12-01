<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Show Book</title>
</head>
<body>
    <div class="collection-banner">
        @include('layout.navbar')
        <div class="wrapper">
            <div class="book-container inner">
                @foreach($book as $b)
                    <div class="book-card barlow-mediumv">
                        @if (filter_var($b->Image, FILTER_VALIDATE_URL))
                            <div class="book-image">
                                <img src="{{$b->Image}}" alt="">
                            </div>
                        @else 
                            <div class="book-image">
                                <img src="{{'storage/post-images/'. $b->Image}}" alt="">
                            </div>
                        @endif
                        <div class="book-detail">
                            <p><b>Title: </b>{{$b->Title}}</p>
                            <p><b>Author Name: </b>{{$b->AuthorName}}</p>
                            <p><b>Genre: </b>{{$b->category->CategoryName}}</p>
                            
                            <div class="flex book-btn barlow-semibold">
                                <a status = "edit" href="{{route('Edit.Book', ['book'=>$b])}}">
                                    <button >Edit</button>
                                </a>
                                <form status = "delete" action="{{ route('Delete.Book', ['book' => $b]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>