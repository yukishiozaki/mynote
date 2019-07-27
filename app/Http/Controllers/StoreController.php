<?php

namespace App\Http\Controllers;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('stores.list', ['stores' => $stores]);
    }
    public function add()
    {
        $categories = Category::all();
        return view('stores.add', compact('categories'));
    }

    public function create(Request $request)
    {
        $this->validate($request, Store::$rules);

        $store = new Store;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $store->fill($form);
        $store->user_id = Auth::user()->id;
        $store->save();

        return redirect('/stores/index');
    }

    public function show(Request $request) {
      $store = Store::find($request->id);
      return view('stores.show', [
          'store' => $store
      ]);
    }
}
