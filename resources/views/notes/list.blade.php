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
                <form action="{{ action('NotesController@update') }}" method="post" enctype="multipart/form-data">
                  <textarea class="memo-area" rows="5" onchange="testtest();">{{ $note->contents }}</textarea>
                </form>

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
<script>
  function testtest(){
    console.log('aaaaa');
    $.post('/notes/edit',
    {
         '_token': $('meta[name=csrf-token]').attr('content')
    }).error(
      function (data) {
        console.log("error");
      }
    )
    .success(
      function (data) {
        console.log("success");
      }
    );
  }
</script>
@endsection
