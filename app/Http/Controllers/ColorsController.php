<?php
namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ColorsController extends Controller
{
    public function add()
    {
        return view('colors.add');
    }
    public function create(Request $request)
    {
        $color = new Color;
        $form = $request->all();
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $color->fill($form);
        $color->save();

        return redirect('/notes/index');
    }
}
