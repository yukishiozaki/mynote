@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card card-new-task">
                    <div class="card-header">(編集予定)ToDo 新規追加</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">(編集予定)ToDo内容</label>
                                <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">(編集予定)追加</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">(編集予定)ToDo一覧</div>
                    <div class="card-body">
                      <form method="POST" action="{{ route('tasks.search') }}">
                          @csrf
                          <table class="table table-striped">
                            <tr>
                              <td>
                                <div class="form-group">
                                    <input id="title" name="title" type="text" maxlength="255" value="{{ $title }}"
                                      class="form-control" autocomplete="off" />
                                </div>
                              </td>
                              <td class="text-right" >
                                <button type="submit" class="btn btn-primary" style="min-width:55px;">（編集予定)検索</button>
                              </td>
                            </tr>
                          </table>
                      </form>
                        <table class="table table-striped">
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>
                                        @if ($task->is_complete)
                                            <s>{{ $task->title }}</s>
                                        @else
                                            {{ $task->title }}
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        @if (! $task->is_complete)
                                            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary" style="min-width:55px;">完了</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
