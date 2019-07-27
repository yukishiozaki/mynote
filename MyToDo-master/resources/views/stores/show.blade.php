@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">
      <div class="jumbotron">
        <h1>お店詳細</h1>
      </div>
      <div class="row">
            <div class="col-12 col-lg-12 pt-4">
              <h4>{{ $store->store_name }}</h4>
              <p>{{ $store->category->name }}</p>
              <p>{{ $store->store_adres }}</p>
              <iframe id='map' src='https://www.google.com/maps/embed/v1/place?key=AIzaSyCac56tlai15iU2Nms-V9NDnprZ8wYBMv4&q={{ $store->store_adres }}'
                 width='100%'
                 height='320'
                 frameborder='0'>
              </iframe>
            </div>
        </div>
    </div>
@endsection
