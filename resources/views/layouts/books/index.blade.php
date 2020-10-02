@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')

<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script> -->
<br>
<div class="container">
    <form class="form-inline" method="POST" action="{{ route('book.filter') }}">
    @csrf
    <label class="sr-only" for="inlineFormInputName2">Book Title</label>
    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror mb-2 mr-sm-2"  value="{{ old('title', $query_param['title'] ?? '')}}" placeholder="Book Title" autocomplete="title"> 
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    <label class="sr-only" for="inlineFormInputName2">Author</label>
    <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror mb-2 mr-sm-2"  value="{{ old('author', $query_param['author'] ?? '')}}" placeholder="Author" autocomplete="author"> 
        @error('author')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    
    <select name="genre" id="genre" class="js-example-basic-single form-control  @error('genre') is-invalid @enderror mb-2 mr-sm-2" >
        <option value="0">-- Select genre --</option>
        @foreach($genre as $row)
            @if($row == old('genre', $query_param['genre'] ?? ''))
                <option value="{{$row}}" selected="selected"> {{$row}}</option>
            @else
                <option value="{{$row}}"> {{$row}}</option>
            @endif
        @endforeach
        <!-- <option value="Member">Member</option> -->
    </select>
    @error('genre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <label class="sr-only" for="inlineFormInputName2">Release year</label>
    <input type="text" id="year" name="year" class="form-control @error('year') is-invalid @enderror mb-2 mr-sm-2"  value="{{ old('year', $query_param['year'] ?? '')}}" placeholder="Release year" autocomplete="year"> 
        @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

    <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>
<br>
<div class="container-fluid pl-20">
    <div class="row flow-offset-1">
    
        @foreach($books as $book)
            <div class="col-xs-5 col-md-3">
                <div class="book tumbnail thumbnail-4"><a href="{{ route('book.show', [$book->id])}}"><img src="{{$book->book_cover}}" height="500" width="350" alt=""></a>
                    <div class="caption">
                    <a class="song_text" href="{{ route('book.show', [$book->id])}}">
                    <b>Authors: </b>
                        @foreach($book->authors as $author)
                                {{$author->first_name}} {{$author->last_name}},
                        @endforeach
                    </a>
                    </div>
                </div>
            </div>
            <br>
            <!-- <a href="{{ route('book.show', [$book->id])}}"><li> {{$book->title}}</li></a>
            <img src="{{$book->book_cover}}" height="350" width="350" alt="">
            @foreach($book->authors as $author)
                <a>{{$author->first_name}} {{$author->last_name}}</a>
            @endforeach -->
        @endforeach
    </div>
</div>
@endsection