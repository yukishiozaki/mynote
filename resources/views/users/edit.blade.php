@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile edit</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update') }}" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="wallpaper" class="col-md-4 col-form-label text-md-right">Wallpaper</label>
                        <div class="col-md-6">
                            @foreach($wallpapers as $wallpaper)
                                <img src="{{ asset('storage/image/' . $wallpaper->image_path) }}" class="img-fluid">
                                <!-- <img src="public/image/MAVJiQ3RcYV6HbtWjFUg4b71GqwtV6QKQMv489Yy.jpeg"> -->

                                @if($user_form->wallpaper_id == $wallpaper->id)
                                    <label><input type="radio" name="wallpaper_id" value='{{ $wallpaper->id}}' checked>{{ $wallpaper->name }}</label>
                                @else
                                    <label><input type="radio" name="wallpaper_id" value='{{ $wallpaper->id}}'>{{ $wallpaper->name }}</label>
                                @endif

                            @endforeach
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            {{ csrf_field() }}
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    UPDATE
                                </button>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
