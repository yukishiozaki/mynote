@extends('layouts.app')

@section('content')
<div class="container-fluid container-90percent">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">
      <div class="jumbotron jumbotron-padding">
        @if ($notes[0]->is_complete == 0)
          <h1 class="h1-color">Notes List</h1>
        @else
          <h1 class="h1-color">Complete List</h1>
        @endif
      </div>
      <div class="row">
          @foreach ($notes as $note)
            <div class="card card-border col-6 col-lg-3 fusen background-color-{{ $note->color->name }} ">
              <div class="cardbody-no-padding">
                <memo-area-component contents={{ $note->contents }}></memo-area-component>
                <div>
                  <a href="{{ action('NotesController@complete', ['id' => $note->id]) }}" onclick='return confirm("君は本当に削除するつもりかい？");' >
                    <div class="actionButton doneEntry nodrag" title="はがす?">
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
