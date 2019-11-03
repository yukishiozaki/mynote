@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-new-task">
                    <div class="card-header">Create note</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="contents">write it down</label>
                                <textarea id="contents" name="contents" type="text" maxlength="255" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }}" autocomplete="off" rows="5"></textarea>
                                @if ($errors->has('contents'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contents') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="color_id">color</label>
                                <select id="color_id" class="form-control" name="color_id">
                                    @foreach($colors as $color)
                                      <option value="{{ $color->id }}">{{ $color->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-right">
                              <button type="submit" class="btn btn-primary">create</button>
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
