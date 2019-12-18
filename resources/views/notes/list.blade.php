@extends('layouts.app')

@section('content')
<div class="container-fluid container-90percent">
  <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-12">

      <div class="jumbotron jumbotron-style">

        @if (count($notes) > 0 && $notes[0]->is_complete == 1)
          <h1 class="h1-color">Complete List</h1>
        @elseif (count($notes) > 0 && $notes[0]->is_complete == 0)
          <h1 class="h1-color">Notes List</h1>
        @else
          <div class="h1-color">no list..</div>
        @endif
      </div>
      <div class="row">

        @foreach ($notes as $note)
          <div class="col-lg-3 pb-3 cardbody-padding">
            <textarea id="note-{{$note->id}}" style="display: none;">{{ $note->contents }}</textarea>
            <div class="card card-border fusen background-color-{{ $note->color->name }} ">
              <div class="cardbody-no-padding">
                <form>
                  <memo-area-component note_id={{ $note->id }}></memo-area-component>
                </form>

                <div>
                  @if ($note->is_complete == 0)
                  <form method="POST" action="{{ route('notes.complete') }}" enctype="multipart/form-data">
                    @CSRF
                    <input type="hidden"　name="id" value="{{ $note->id }}"/>
                    <button type="submit" type="hidden" class="actionButton doneEntry nodrag" title="Delete?">
                    </button>
                  </form>

                    <!-- <a href="{{ action('NotesController@complete', ['id' => $note->id]) }}" tabindex="-1" onclick='return confirm("Are you sure to move this note to "Complete List"？");' >
                      <div class="actionButton doneEntry nodrag" title="Delete?">
                      </div>
                    </a>
                   -->


                    <!-- <form method="POST" action="{{ route('notes.complete') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input id="name" name="name">
                        <div class="actionButton doneEntry nodrag" title="Delete?">
                        </div>
                      <button type="submit" class="btn btn-primary"></button>
                    </form> -->

                  @else
                  <!-- <form method="POST">
                    <a href="{{ action('NotesController@delete', ['id' => $note->id]) }}" tabindex="-1" onclick='return confirm("Are you sure to delete this note？");' >
                      <div class="actionButton doneEntry nodrag" title="Delete?">
                      </div>
                    </a>
                  </form> -->

                  <form method="POST" action="{{ route('notes.delete')}}" enctype="multipart/form-data">
                    @CSRF
                    <input type="hidden" name="id" value="{{ $note->id }}"/>
                    <button type="submit" type="hidden" class="actionButton doneEntry nodrag" title="Delete?">
                    </button>
                  </form>

                    <!-- <a href="{{ action('NotesController@delete', ['id' => $note->id]) }}" tabindex="-1" onclick='return confirm("Are you sure to delete this note？");' >
                      <div class="actionButton doneEntry nodrag" title="Delete?">
                      </div>
                    </a> -->

                    <!-- <form method="POST" action="{{ route('notes.delete') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input id="name" name="name">
                        <div class="actionButton doneEntry nodrag" title="Delete?">
                        </div>
                      <button type="submit" class="btn btn-primary"></button>
                    </form> -->


                  @endif
                </div>
              </div>
            </div>
          </div>
          @endforeach
    </div>
  </div>
</div>
@endsection
