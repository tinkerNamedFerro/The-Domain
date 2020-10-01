@extends('layouts.app')
@section('title')
    {{$book->title}}
@endsection
@section('content')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="application/javascript" src="{{ asset('js/epub.min.js') }}"></script>
<script type="application/javascript">
    $(document).ready(function(){
        //http://87.120.36.5/main/784000/f92f617da04f92d58f6b71e6595af8c3/Kurt%20Vonnegut%20-%20Cat%27s%20Cradle%20%20-Dial%20Press%20%282009%29.epub
        var book = ePub("https://gofile.io/d/RHILJL");
        var rendition = book.renderTo("area", {width: 600, height: 400});
        var displayed = rendition.display();
    });
</script>
<h1>sdasd</h1>
<div id="area"></div>

@endsection