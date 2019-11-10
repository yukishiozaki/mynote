@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-new-task">
                    <div class="card-header">Edit note</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('notes.update') }}">
                          @csrf
                          <div class="form-group">
                              <label for="contents">write it down</label>
                              <textarea id="contents" name="contents" type="text" maxlength="250" class="form-control{{ $notes_form->contents }}" autocomplete="off" rows="5"></textarea>
                              @if ($errors->has('contents'))
                                  <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('contents') }}</strong>
                              </span>
                              @endif
                          </div>

                          <div class="form-group">
                              <label for="color_id">color</label>
                              <select id="color_id" class="form-control" name="color_id">
                                  @foreach($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                  @endforeach
                              </select>
                          </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
