@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">
      <div class="jumbotron">
        <h1>Notes List</h1>
      </div>
      <div class="row">
          @foreach ($notes as $note)

            <div class="card col-6 col-lg-4 pt-4">
              <div class="card-body">

                <p class="card-text">{{ $note->contents }}</p>

              </div>
            </div>


          @endforeach
     </div>
   </div>
  </div>
</div>
@endsection
