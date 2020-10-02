@extends('layouts.app')
@section('title')
    {{$book->title}}
@endsection
@section('content')
    <div class="container-lg">
        <div class="row">
            <div class="col-4">
                <i class="las la-angle-left"></i><a href="{{ route('book.index') }}"> Back to list </a>
                <img src="{{$book->book_cover}}" height="500" width="350" alt="">
            </div>
            <div class="col-6">
                <h1>{{$book->title}}</h1>
                <p><b>Genre: </b>{{$book->genre}}</p>
                <p><b>Authors: </b>
                @foreach($book->authors as $author)
                        {{$author->first_name}} {{$author->last_name}},
                @endforeach
                    </p>
                @auth
                    @if (!$review_exists == 1)
                        <p><a href="{{ route('review.create', [$book->id])}}">Add review</a></p>
                    @endif
                    <a class="btn btn-secondary" href="{{ route('book.getBook', [$book->id])}}" role="button">Get Book</a>
                    @if (Auth::user()->role == "Curator" AND Auth::user()->status == "Approved")
                        <a class="btn btn-secondary" href="{{ route('book.edit', [$book->id])}}" role="button">Edit Book</a>
                            <form id="delete_book" method="POST" action="{{ route('book.destroy', [$book->id])}}">
                                {{csrf_field()}}
                                {{ method_field('DELETE') }}
                                <input button="submit" class="btn btn-secondary" type="submit" value="Delete Book">
                            </form>
                    @endif
                @endauth
            </div>
        </div>
    </div>
    <br>
    <div class="container">
    @foreach($reviews as $review)
        <div class="w-400 my-10">
            <div class="card">
                <h2 class="card-title">
                    {{$review->users->name}}, Rating: {{$review->rating}}
                </h2>
                @auth
                @if(Auth::user()->id == $review->users_id)
                    <div class="text-right"> <!-- text-right = text-align: right -->
                        <a href="{{ route('review.edit', [$book->id, $review->id])}}" class="btn">Edit Review</a>
                    </div>
                @endif
                @endauth
                <p>
                {{$review->written_text}}
                </p>
            </div>
        </div>
    @endforeach
    </div>
    {{$reviews->links()}}
@endsection