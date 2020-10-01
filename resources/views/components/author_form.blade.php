<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <!-- firstname -->
    <!-- lastname -->
    <!-- dob  -->
    <!-- nationality -->
    <h1>Author </h1>
    @error('generic')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div class="form-group row">
        <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name', $author->first_name ?? '')}}" required autocomplete="first_name">

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name', $author->last_name ?? '')}}" required autocomplete="last_name">

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

        <div class="col-md-6">
            <input id="date_of_birth" type="text" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{old('date_of_birth', $author->date_of_birth ?? '')}}" required autocomplete="date_of_birth">

            @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

        <div class="col-md-6">
            <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{old('nationality', $author->nationality?? '')}}" required autocomplete="nationality">

            @error('nationality')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <!-- <div class="form-group row">
        <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>
        <div class="col-md-6">
            <div class='input-group date' id='date_of_birth'>
                <input type='text' class="form-control datepicker" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div> -->

</div>