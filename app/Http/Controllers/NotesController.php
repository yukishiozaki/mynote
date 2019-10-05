<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

  public function add()
  {
      return view('notes.add');
  }

  public function create(Request $request)
  {

      return redirect('notes/add');
  }

}
