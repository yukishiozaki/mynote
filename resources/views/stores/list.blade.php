@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">
      <div class="jumbotron">
        <h1>(編集予定)お店一覧</h1>
      </div>
      <div class="row">
          @foreach ($stores as $store)
            <div class="col-6 col-lg-4 pt-4">
              <h4>{{ $store->store_name }}</h4>
              <p>{{ $store->category->name }}</p>
              <p><a class="btn btn-secondary" href="{{ route('store.show', ['id' => $store->id]) }}" role="button">詳細</a></p>
            </div>
          @endforeach
        </div>
    </div>
@endsection
