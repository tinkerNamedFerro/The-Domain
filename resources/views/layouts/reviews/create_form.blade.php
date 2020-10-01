@extends('layouts.app')
@section('title')
    Books
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Review') }}</div>

                <div class="card-body">
                    @if ($review ?? '')
                        <form method="POST" action="{{ route('review.update', [$book_id, $review->id]) }}">
                        {{ method_field('PUT') }}
                    @else
                        <form method="POST" action="{{ route('review.store') }}">
                        
                    @endif
                        @csrf
                        <div class="form-group row">
                            <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('Rating') }}</label>

                            <div class="col-md-6">
                                <input id="rating" type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{old('rating', $review->rating?? '')}}" required autocomplete="rating" autofocus>

                                @error('rating')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="written_text" class="col-md-4 col-form-label text-md-right">{{ __('Review') }}</label>

                            <div class="col-md-6">
                                <textarea id="written_text" data-validation="required"  name="written_text" class="form-control @error('written_text') is-invalid @enderror" rows="4" cols="50">{{old('written_text', $review->written_text?? '')}}</textarea>
                                @error('written_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <input type="hidden" id="book_id" name="book_id" value="{{$book_id}}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @if ($review ?? '')
                                        {{ __('Edit Review') }}     
                                    @else
                                        {{ __('Add Review') }}                                
                                    @endif             
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection