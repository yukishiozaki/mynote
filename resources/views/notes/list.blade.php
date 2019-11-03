@extends('layouts.app')

@section('content')
<div class="container-fluid container-90percent">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">
      <div class="jumbotron jumbotron-padding">
        <h1>Notes List</h1>
      </div>
      <div class="row">
          @foreach ($notes as $note)

            <div class="card card-border col-6 col-lg-3 background-color-{{ $note->color->name }} ">
              <div class="cardbody-no-padding">

                <textarea class="memo-area" rows="5">{{ $note->contents }}</textarea>
                <div class="actionButton doneEntry nodrag" title="はがす"></div>

              </div>
            </div>


          @endforeach
     </div>
   </div>
  </div>
</div>
@endsection
