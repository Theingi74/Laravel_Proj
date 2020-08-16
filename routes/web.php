<?php
use App\Receipe;
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


/*Route::get('/',function(){
	dd(app('test'));
});*/

Route::resource('receipe','ReceipeController');
Route::get('home','HomeController@index');
Auth::routes();




/*Route::get('receipe', 'ReceipeController@index');
Route::get('receipe/create','ReceipeController@createReceipeForm');
Route::get('receipe/{id}','ReceipeController@show');
Route::post('receipe','ReceipeController@create');
Route::get('receipe/{id}/edit','ReceipeController@edit');
Route::patch('receipe/{id}','ReceipeController@update');
Route::delete('receipe/{id}','ReceipeController@delete');
*/


//get all index page(GET) /receipe
//create form (GET) receipe/create
//show data(GET) receipe/1
//create receipe (POST) request
//edit form(GET) receipe/1/edit
//update form(PATCH) receipe/1
//delete receipe (DELETE) request receipe/1

