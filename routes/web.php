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



//Page Controller
Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index');
Route::post('/', 'PagesController@index');
Route::post('/index', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/newcust', 'PagesController@newcust');
Route::get('/managecust', 'PagesController@managecust');
Route::post('/managecust', 'PagesController@managecuststatus');
Route::get('/reports', 'PagesController@reports');
Route::get('/logout', 'PagesController@logout');
Route::post('/login', 'PagesController@login');
Route::get('/login', 'PagesController@login');

Route::get('/newagent', 'PagesController@newagent');
Route::get('/manageagent', 'PagesController@manageagent');
Route::post('/manageagent', 'PagesController@manageagentstatus');
Route::post('/newagent', 'PagesController@newagentadded');

//DeliveryController
Route::get('/deliveryjob', 'DeliveryController@opendeliveryjob');
Route::get('/publishdeliveryjob/{key}', 'DeliveryController@publishdeliveryjob');


Route::get('/404', 'PagesController@err_404');

//Customer Controller
Route::post('/addnewcustomer', 'CustomerController@addnewcust');


//All API controller
Route::post('/API/request', 'APIController@apicall');
Route::get('/API/request', 'APIController@apicall');


//redirect all invalid route to 404
Route::any('{all}', 'PagesController@err_404')->where('all', '.*');