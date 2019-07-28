<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::resource('tasks', 'TaskController', [
        'only' => [
            'index', 'store', 'update'
        ]
    ]);
    Route::post('tasks/search', 'TaskController@search')->name('tasks.search');;
    Route::get('stores/add', 'StoreController@add')->name('store.add');
    Route::post('stores/create', 'StoreController@create')->name('store.create');
    Route::get('categories/add', 'CategoriesController@add')->name('category.add');
    Route::post('categories/create', 'CategoriesController@create')->name('category.create');
});

Route::get('stores/index', 'StoreController@index')->name('store.list');
Route::get('stores/show', 'StoreController@show')->name('store.show');
