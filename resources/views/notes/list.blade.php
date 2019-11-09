@extends('layouts.app')

@section('content')
<div class="container-fluid container-90percent">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">
      <div class="jumbotron jumbotron-padding">
        <h1 class="h1-color">Notes List</h1>
      </div>
      <div class="row">
          <div class="col-md-4">
              <a href="{{ action('NotesController@add') }}" role="button" class="btn btn-primary">CREATE NOTE</a>
          </div>
      </div>
      <div class="row">
          @foreach ($notes as $note)

            <div class="card card-border col-6 col-lg-3 fusen background-color-{{ $note->color->name }} ">
              <div class="cardbody-no-padding">

                <textarea class="memo-area" rows="5">{{ $note->contents }}</textarea>

                  <div>
                      <a href="{{ action('NotesController@edit', ['id' => $note->id]) }}">
                      <div class="actionButton doneEntry nodrag" title="はがす">
                      </div>
                      </a>
                </div>



              </div>
            </div>


          @endforeach
     </div>
   </div>
  </div>
</div>
@endsection
