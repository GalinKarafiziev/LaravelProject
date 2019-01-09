<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware'=>'web'], function () 
{

	Route::get('/homepage', 'HomeController@index');
	Route::get('/dogs', 'DogsController@index');
	Route::get('/dogs/{id}', 'DogsController@show');
});
*/
Route::get('/users', 'UserControllers@index');
Route::delete('/users/{id}', 'UserControllers@delete');
Route::put('/users', 'UserControllers@update');
Route::post('/users', 'UserControllers@create');
Route::get('/users/{id}', 'UserControllers@user');
