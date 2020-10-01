@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
<ul>
    @foreach($curators as $curator)
        @if ($curator->status == "Waiting for approval")
        <!-- Waiting for approval -->
            <li> {{$curator->name}} {{$curator->status}}
            <button onclick="location.href='{{ route('admin.approve_curator', $curator->id) }}'" type="button" class="btn btn-primary">Approve Curator</button>
            </li>
        @else
        <!-- Approved Curators -->
            <li> {{$curator->name}} {{$curator->status}}</li>
        @endif
    @endforeach
</ul>

@endsection
