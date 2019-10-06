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
                <div class="card card-new-task">
                    <div class="card-header">Create note</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="contents">write it down</label>
                                <input id="contents" name="contents" type="text" maxlength="255" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }}" autocomplete="off" />
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
                            <button type="submit" class="btn btn-primary">create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
