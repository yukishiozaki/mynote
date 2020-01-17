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
  
    Route::get('notes/add', 'NotesController@add')->name('notes.add');
    Route::post('notes/complete', 'NotesController@complete')->name('notes.complete');
    Route::post('notes/edit', 'NotesController@update')->name('notes.update');
    Route::post('notes/delete', 'NotesController@delete')->name('notes.delete');
    Route::get('colors/add', 'ColorsController@add')->name('color.add');
    Route::post('colors/create', 'ColorsController@create')->name('color.create');
    Route::get('wallpapers/add', 'WallpapersController@add')->name('wallpaper.add');
    Route::post('wallpapers/create', 'WallpapersController@create')->name('wallpaper.create');
    Route::get('users/edit', 'UsersController@edit')->name('users.edit');
    Route::post('users/edit', 'UsersController@update')->name('users.update');
    Route::get('notes/index', 'NotesController@index')->name('notes.list');
    Route::get('notes/completelist', 'NotesController@completeList')->name('notes.completelist');
    Route::post('notes/create', 'NotesController@create')->name('notes.create');
});
