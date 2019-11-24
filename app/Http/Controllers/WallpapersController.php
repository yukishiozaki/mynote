<?php
namespace App\Http\Controllers;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WallpapersController extends Controller
{
    public function add()
    {
        return view('wallpapers.add');
    }
    public function create(Request $request)
    {
        $wallpaper = new Wallpaper;
        $form = $request->all();

        if ($form['image']) {


          $path = $request->file('image')->store('public/image');
          $wallpaper->image_path = basename($path);
        } else {
          $wallpaper->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        unset($form['image']);


        $wallpaper->fill($form);
        $wallpaper->save();

        return redirect('/notes/index');
    }
}
