<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//ログイン前TOP

Route::get('/', 'FirstController@index')->name('first.index');

//ページに認証を求める
Route::group(['middleware' => 'auth'], function () {

    //ログイン後TOP
    Route::get('/top', 'TopController@index')->name('top.index');

    //お店リスト
    Route::get('/list', 'ListController@index')->name('list.index');

    //新規登録/編集 確認ページ
    Route::get('/list/create', 'ListController@createForm')->name('list.createForm');
    Route::post('/list', 'ListController@create')->name('list.create');
    Route::post('/list/create/confirm', 'ListController@confirm')->name('create.confirm');

    //リスト詳細、編集、削除
    Route::get('/list/{id}', 'ListController@content')->name('list.content');
    Route::get('/list/{id}/edit', 'ListController@edit')->name('list.edit');
    Route::put('/list/{id}', 'ListController@update')->name('list.update');
    Route::delete('/list/{id}/delete', 'ListController@delete')->name('list.delete');

    //カテゴリー管理
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::post('/categories', 'CategoryController@create')->name('categories.create');
    Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
    Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('/categories/{category}', 'CategoryController@delete')->name('categories.delete');
});



//Route::get('/home', 'HomeController@index')->name('home');
