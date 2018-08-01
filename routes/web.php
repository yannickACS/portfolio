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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::middleware('admin')->group(function () {
    Route::resource ('page', 'PageController', [
        'except' => 'show'
    ]);
});
Route::middleware('admin')->group(function () {
    Route::resource('image', 'ImageController', [
        'except' => 'show'
    ]);
});
Route::middleware('admin')->group(function () {
    Route::resource('article', 'ArticleController', [
        'except' => 'show'
    ]);
});