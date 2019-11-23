@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
        @endif
        <div class="card card-new-wallpaper">
          <div class="card-header">wallpaper</div>
          <div class="card-body">
            <form method="POST" action="{{ route('wallpaper.create') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="wallpaper_name">name</label>
                <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" />


                <label for="wallpaper_image">image</label>
                <input type="file" class="form-control-file" name="image">

                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
              <button type="submit" class="btn btn-primary">register</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
