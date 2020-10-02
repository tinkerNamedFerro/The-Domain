@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
<div class="container"><br><br></div>
<div class="container-fluid">
    <div class="row flow-offset-1">
    
        @foreach($books as $book)
            <div class="col-xs-6 col-md-4">
                <div class="book tumbnail thumbnail-3"><a href="{{ route('book.show', [$book->id])}}"><img src="{{$book->book_cover}}" height="500" width="350" alt=""></a>
                    <div class="caption">
                    <a class="song_text" href="{{ route('book.show', [$book->id])}}">{{$book->title}} {{round($book->reviews()->avg('rating'),1)}}</a>
                    </div>
                </div>
            </div>
            <!-- <a href="{{ route('book.show', [$book->id])}}"><li> {{$book->title}}</li></a>
            <img src="{{$book->book_cover}}" height="350" width="350" alt="">
            @foreach($book->authors as $author)
                <a>{{$author->first_name}} {{$author->last_name}}</a>
            @endforeach -->
        @endforeach
    </div>
</div>
@endsection