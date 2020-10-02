@extends('layouts.app')
@section('title')
    Books
@endsection
@section('content')
<!-- <script type="application/javascript" src="{{ asset('js/app.js') }}"></script> -->
<script type="application/javascript">
    var i = 0;
    function add_author() {
        var selectBox = document.getElementById("author_selector");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        var selectedId = selectBox.options[selectBox.selectedIndex].id;
        console.log(selectedValue + " " + selectedId);
        ++i;
        $("#author_list").append('<tr><td>'+selectedId+'<input type="hidden" hidden name="addmore['+selectedValue+'][name]" value="'+selectedValue+'" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    }
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
    $(document).ready(function(){
        // $('.js-example-basic-single').select2();
        $("p").click(function(){
            console.log("adsad");
            $(this).hide();
        });
        $("#add_author").click(function(){
            console.log("test");
        });
        document.getElementById("imageid").addEventListener("change", readFile);
    });

    function readFile() {
            if (this.files && this.files[0]) {
                var FR= new FileReader();     
                FR.addEventListener("load", function(e) {
                document.getElementById("imageid").src = e.target.result;
                document.getElementById("imagebase64").value = e.target.result;
                });             
                FR.readAsDataURL( this.files[0] );
            } 
        }

    
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Book') }}</div>

                <div class="card-body">
                    @error('addmore')
                        <div class="alert alert-danger">
                            <strong> Must have at least one author</strong>
                        </div>
                    @enderror
                    @error('imagebase64')
                        <div class="alert alert-danger">
                            <strong> Must upload book cover</strong>
                        </div>
                    @enderror
                    <form method="POST" action="{{ route('book.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', Session::get('title') ?? '') }}" autocomplete="title" autofocus>

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
                                <input id="publication" type="text" class="form-control @error('publication') is-invalid @enderror" name="publication" value="{{ old('publication', Session::get('publication') ?? '') }}" autocomplete="publication">

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
                                <select name="genre" class="js-example-basic-single form-control  @error('genre') is-invalid @enderror" id="genre">
                                    <option value="0">-- Select genre --</option>
                                    @foreach($genre as $row)
                                        @if($row == old('genre', Session::get('genre') ?? ''))
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

                        <div class="form-group row">
                            <label for="imagebase64" class="col-md-4 col-form-label text-md-right">{{ __('Book Cover') }}</label>

                            <div class="col-md-6">
                            <input name="imagebase64" id="imagebase64" hidden type="text" autocomplete="off"/>
                            <input id="imageid" type="file" name="image">
                                @error('imagebase64')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="author_selector" class="col-md-4 col-form-label text-md-right">{{ __('Author Selector') }}</label>

                            <div class="col-md-6">
                                <!-- <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role"> -->
                                <select name="author_selector" onchange="add_author();" class="js-example-basic-single form-control  @error('author_selector') is-invalid @enderror" id="author_selector">
                                    <option value="0">-- Add Author --</option>
                                    @foreach($authors as $author)
                                        <option id="{{$author->first_name}} {{$author->last_name}}" value="{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</option>
                                    @endforeach
                                    <!-- <option value="Member">Member</option> -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button name="action" value="add_author" type="submit" class="btn btn-secondary">
                                    {{ __('Add Author') }}
                                </button>
                            </div>
                        </div>
                        <br><br>
                        
                        <div class="container col-md-8" id="author_list">
                        </div>
                        <br><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button name="action" value="add_book" type="submit" class="btn btn-primary">
                                    {{ __('Add book') }}
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