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
Route::get('/list/create', 'ListController@createForm')->name('list.createForm');
Route::post('/list', 'ListController@create')->name('list.create');
Route::get('/list/{id}', 'ListController@content')->name('list.content');
Route::get('/list/{id}/edit', 'ListController@edit')->name('list.edit');
Route::put('/list/{id}', 'ListController@update')->name('list.update');
Route::delete('/list/{id}/delete', 'ListController@delete')->name('list.delete');
