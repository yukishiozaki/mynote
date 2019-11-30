<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsersController extends Controller
{

  public function edit(Request $request)
  {
      $user = Auth::user();
      //dd($user);

      if (empty($user)) {
        abort(404);
      }

      $wallpapers = Wallpaper::all();
      //dd($wallpapers);
      //dd($user->wallpaper);

      return view('users.edit', ['user_form' => $user, 'wallpapers' => $wallpapers]);

  }

  public function update(Request $request)
  {
      // Validationをかける
      //$this->validate($request, User::$rules);
      // User Modelからデータを取得する
      $user = User::find($request->id);
      //dd($user);
      // 送信されてきたフォームデータを格納する

      //$user_form = $request->input('users_name');
      $user_form = $request->all();
      //dd($user_form);
      unset($user_form['_token']);

      // 該当するデータを上書きして保存する
      $user->fill($user_form)->save();


      return redirect('notes/index');
  }

}
