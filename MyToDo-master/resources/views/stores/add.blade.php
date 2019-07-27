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
                    <div class="card-header">お店登録</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.create') }}">
                            @csrf
                            <div class="form-group">
                                <label for="store_name">店名</label>
                                <input id="store_name" name="store_name" type="text" maxlength="255" class="form-control{{ $errors->has('store_name') ? ' is-invalid' : '' }}" autocomplete="off" />
                                @if ($errors->has('store_name'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('store_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="store_adres">住所</label>
                                <input id="store_adres" name="store_adres" type="text" maxlength="255" class="form-control{{ $errors->has('store_adres') ? ' is-invalid' : '' }}" autocomplete="off" />
                                @if ($errors->has('store_adres'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('store_adres') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category_id">ジャンル</label>
                                <select id="category_id" class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
