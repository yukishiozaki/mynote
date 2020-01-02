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
                <div>
                @if ($note->is_complete == 0)
                  <form>
                    <memo-area-component note_id={{ $note->id }}></memo-area-component>
                  </form>
                  <form method="POST" action="{{ route('notes.complete') }}" enctype="multipart/form-data">
                    @CSRF
                    <input type="hidden"　name="id" value="{{ $note->id }}"/>
                    <button onclick="return confirm('Complete Listへ移動させますか？')" type="submit" type="hidden" class="actionButton doneEntry nodrag" title="Delete?" tabindex="-1" >
                    </button>
                  </form>
                @else
                  <textarea readonly class="memo-area" rows="5">{{ $note->contents }}</textarea>
                  <form method="POST" action="{{ route('notes.delete')}}" enctype="multipart/form-data">
                    @CSRF
                    <input type="hidden" name="id" value="{{ $note->id }}"/>
                    <button onclick="return confirm('完全に削除しますか？')" type="submit" type="hidden" class="actionButton doneEntry nodrag" title="Delete?" tabindex="-1" >
                    </button>
                  </form>
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
