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

Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index');
Route::post('/', 'PagesController@index');
Route::post('/index', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/logout', 'PagesController@logout');
Route::post('/login', 'PagesController@login');
Route::get('/login', 'PagesController@login');