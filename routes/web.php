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

    Route::get('notes/add', 'NotesController@add')->name('notes.add');
    Route::get('notes/complete', 'NotesController@complete')->name('notes.complete');
    Route::get('notes/edit', 'NotesController@edit')->name('notes.edit');
    Route::post('notes/edit', 'NotesController@update')->name('notes.update');
    Route::get('notes/delete', 'NotesController@delete')->name('notes.delete');

    Route::get('colors/add', 'ColorsController@add')->name('color.add');
    Route::post('colors/create', 'ColorsController@create')->name('color.create');

});

Route::get('stores/index', 'StoreController@index')->name('store.list');
Route::get('stores/show', 'StoreController@show')->name('store.show');

Route::get('notes/index', 'NotesController@index')->name('notes.list');
Route::get('notes/completelist', 'NotesController@completeList')->name('notes.list');

Route::post('notes/create', 'NotesController@create')->name('notes.create');
