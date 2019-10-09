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
            <div class="col-6 col-lg-4 pt-4">
              <h4>{{ $note->note_name }}</h4>
              <p>{{ $note->category->name }}</p>
              <p><a class="btn btn-secondary" href="{{ route('note.show', ['id' => $note->id]) }}" role="button">詳細</a></p>
            </div>
          @endforeach
     </div>
   </div>
  </div>
</div>
@endsection
