<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotesController extends Controller
{

  public function add()
  {
      $colors = Color::all();

      return view('notes.add', compact('colors'));
      //return view('notes.add');



  }

  public function create(Request $request)
  {

      $this->validate($request, Note::$rules);

      $notes = new Note;

      $form = $request->all();



      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $notes->fill($form);
      $notes->user_id = Auth::user()->id;

      $notes->is_complete = 0;

      $notes->save();



      session()->flash('status', 'Created！');

      return redirect('/notes/add');

      //return redirect('notes/add');
  }

  public function index()
  {

      // $notes = Note::all()->sortByDesc('updated_at');
      $notes = Note::where('is_complete', 0)
                    ->where('user_id', Auth::id())
                    ->get()
                    ->sortByDesc('updated_at');


      //dd(Auth::id());

      return view('notes.list', ['notes' => $notes]);
  }

  public function completeList()
  {
      $one = 1;
      $notes = Note::where('is_complete', $one)
                    ->where('user_id', Auth::id())
                    ->get()
                    ->sortByDesc('updated_at');

      return view('notes.list', ['notes' => $notes]);
  }

  public function update(Request $request)
  {
    $note = Note::find($request->id);
    $notes_form = $request->all();
    unset($notes_form['_token']);

    $note->fill($notes_form)->save();
  }

  public function complete(Request $request)
  {
      $note = Note::find($request->id);
      $note->is_complete = 1;
      $note->save();

      // return redirect('notes/index')->with('flash_message', 'Complete Listへ移動させますか？');
      return redirect('notes/index');
  }

  public function delete(Request $request)
  {
      $note = Note::find($request->id);
      $note->is_complete = 2;
      $note->save();

      return redirect('notes/completelist');
  }

}
