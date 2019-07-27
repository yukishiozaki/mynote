<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Auth::user()
            ->tasks()
            ->orderBy('is_complete')
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('tasks', [
            'tasks' => $tasks,
            'title' => '',
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
        ]);

        Auth::user()->tasks()->create([
            'title' => $data['title'],
            'is_complete' => false,
        ]);

        session()->flash('status', '作成しました！');

        return redirect('/tasks');
    }

    public function search(Request $request)
    {
      $tasks = Auth::user()
          ->tasks()
          ->where('title', 'LIKE', "%{$request->title}%")
          ->orderBy('is_complete')
          ->orderByDesc('created_at')
          ->paginate(5);

      return view('tasks', [
          'tasks' => $tasks,
          'title' => $request->title,
      ]);
    }

    public function update(Task $task)
    {
        $this->authorize('complete', $task);
        $task->is_complete = true;
        $task->save();

        session()->flash('status', '完了しました！');

        return redirect('/tasks');
    }
}
