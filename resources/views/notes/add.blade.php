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
                    <div class="card-header">Note作成</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="contents">内容</label>
                                <input id="contents" name="contents" type="text" maxlength="255" class="form-control{{ $errors->has('contents') ? ' is-invalid' : '' }}" autocomplete="off" />
                                @if ($errors->has('contents'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('contents') }}</strong>
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
