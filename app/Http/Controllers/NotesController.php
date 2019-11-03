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
      $notes->save();

      session()->flash('status', '作成しました！');

      return redirect('/notes/add');

      //return redirect('notes/add');
  }

  public function index()
  {
      $notes = Note::all();

      return view('notes.list', ['notes' => $notes]);
  }


}
