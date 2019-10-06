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

      return redirect('notes/add');
  }

  public function index()
  {
      //$notes = Note::all();
      //return view('notes.list', ['notes' => $notes]);
      return view('notes.list');
  }


}
