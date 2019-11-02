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
                    <div class="card-header">color登録</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('color.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="store_name">color</label>
                                <input id="name" name="name" type="text" maxlength="20" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" />
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
