<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/top', 'TopController@index')->name('top.index');

Route::get('/list', 'ListController@index')->name('list.index');
//新規登録
Route::get('/list/create', 'ListController@createForm')->name('list.createForm');
Route::post('/list/create', 'ListController@create')->name('list.create');
//編集 論理削除
Route::get('/list/{id}', 'ListController@content')->name('list.content');
Route::get('/list/{id}/edit', 'ListController@edit')->name('list.edit');
Route::put('/list/{id}', 'ListController@update')->name('list.update');
Route::delete('/list/{id}/delete', 'ListController@delete')->name('list.delete');
//確認画面
Route::get('/list/create/confirm', 'ListController@showConfirm')->name('show.confirm');
Route::post('/list/create/confirm', 'ListController@confirm')->name('create.confirm');

Route::get('/category', 'CategoryController@index')->name('category.index');
Route::post('/category', 'CategoryController@create')->name('category.create');
Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
Route::delete('/category/{id}', 'CategoryController@delete')->name('category.delete');
