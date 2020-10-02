@extends('layouts.app')
@section('title')
    Books
@endsection
@section('content')
<script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
<script type="application/javascript">
    $(document).on('click', '.remove-tr', function(){ 
        console.log('sdasdsa'); 
        $(this).parent().parent().remove();
    });   
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {
        e.preventDefault(); // does not go through with the link.

        var $this = $(this);

        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            if (data["status"] == "success"){
                location.reload(true);
            }else{
                $('#must_have_author').show();
            }
            
        });
    });

</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>
                <div class="alert alert-danger collapse" id="must_have_author">
                  Book must at least one author 
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('book.update', $book->id) }}">
                        @csrf
                        {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title', $book->title)}}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publication" class="col-md-4 col-form-label text-md-right">{{ __('Publication Year') }}</label>

                            <div class="col-md-6">
                                <input id="publication" type="text" class="form-control @error('publication') is-invalid @enderror" name="publication" value="{{old('publication', $book->publication)}}" required autocomplete="publication">

                                @error('publication')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('genre') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role"> -->
                                <select name="genre" class="form-control  @error('genre') is-invalid @enderror" id="genre">
                                    <option value="0">-- Select genre --</option>
                                    @foreach($genre as $row)
                                        @if($row == old('genre', $book->genre))
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
                            </div>
                        </div>
                        <div class="col-md-10" id="author_list">
                            <table>
                            @foreach($book->authors as $author)
                                
                                    <tr>
                                    <td>{{$author->first_name}} {{$author->last_name}}<input type="text" hidden name="addmore[{{$author->id}}][name]" value="{{$author->id}}" class="form-control" /></td>
                                    <td>
                                        <a href="{{ route('author.edit', [$author->id])}}">
                                        <button type="button" class="btn btn-secondary ">Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='{{url("author/$author->id")}}' data-method="delete" class="jquery-postback"><button type="button" class="btn btn-danger">Remove</button></a>
                                        
                                    </td>
                                    </tr>
                            @endforeach
                            </table>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit book') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <form id="author_delete" method="POST" action='{{url("author/$author->id")}}'>
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection