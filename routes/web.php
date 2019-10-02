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

Route::get('/', 'WebComicController@index')->name('comic');
Route::get('/me', 'MeController@index')->name('index');
Route::get('/comic/{comicNumber}', 'WebComicController@getComicByNumber');
