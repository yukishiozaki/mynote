<?php
namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CategoriesController extends Controller
{
    public function add()
    {
        return view('categories.add');
    }
    public function create(Request $request)
    {
        $category = new Category;
        $form = $request->all();
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $category->fill($form);
        $category->save();
        return redirect('/stores/index');
    }
}
