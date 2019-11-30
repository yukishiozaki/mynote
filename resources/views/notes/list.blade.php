@extends('layouts.app')

@section('content')
<div class="container-fluid container-90percent">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">

      <div class="jumbotron jumbotron-style">
        @if (count($notes) > 0 && $notes[0]->is_complete == 1)
          <h1 class="h1-color">Complete List</h1>
        @else
          <h1 class="h1-color">Notes List</h1>

        @endif
      </div>
      <div class="row">
          @foreach ($notes as $note)
            <textarea id="note-{{$note->id}}" style="display: none;">{{ $note->contents }}</textarea>
            <div class="card card-border col-6 col-lg-3 fusen background-color-{{ $note->color->name }} ">
              <div class="cardbody-no-padding">
                <form>
                  <memo-area-component note_id={{ $note->id }}></memo-area-component>
                </form>
                <div>
                  <a href="{{ action('NotesController@complete', ['id' => $note->id]) }}" tabindex="-1" onclick='return confirm("Are you sure to delete this note？");' >
                    <div class="actionButton doneEntry nodrag" title="Delete?">
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
