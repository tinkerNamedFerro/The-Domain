@extends('layouts.app')
@section('title')
    Books
@endsection
@section('content')
<script type="application/javascript">

</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Author') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('author.update', [$author->id]) }}">
                        @csrf
                        {{method_field('PUT')}}
                        <x-author_form :author="$author"/>
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button name="action" value="add_book" type="submit" class="btn btn-primary">
                                    {{ __('Edit Author') }}
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