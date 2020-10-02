@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
<div class="container"><br><br></div>
@if ($recommended_allowed == 0 or $books == 'null')
    <div class="alert alert-danger">
        Must be logged in or have made at least 3 reviews
    </div>
@endif
<div class="container-fluid">
    <div class="row flow-offset-1">
        @if ($books != 'null')
            @foreach($books as $book)
                <div class="col-xs-6 col-md-4">
                    <div class="book tumbnail thumbnail-3"><a href="{{ route('book.show', [$book->id])}}"><img src="{{$book->book_cover}}" height="500" width="350" alt=""></a>
                        <div class="caption">
                        <a class="song_text" href="{{ route('book.show', [$book->id])}}">{{$book->title}} {{$book->reviews()->avg('rating')}}</a>
                        </div>
                    </div>
                </div>
                <!-- <a href="{{ route('book.show', [$book->id])}}"><li> {{$book->title}}</li></a>
                <img src="{{$book->book_cover}}" height="350" width="350" alt="">
                @foreach($book->authors as $author)
                    <a>{{$author->first_name}} {{$author->last_name}}</a>
                @endforeach -->
            @endforeach   
        @endif
    </div>
</div>
@endsection