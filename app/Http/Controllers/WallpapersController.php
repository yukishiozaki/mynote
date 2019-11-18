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
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $wallpaper->fill($form);
        $wallpaper->save();

        return redirect('/notes/index');
    }
}
