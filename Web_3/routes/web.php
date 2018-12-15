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

Route::get('/', 'DogsController@index');
Route::get('/about', 'PagesController@about');
Route::resource('dogs', 'DogsController');

Auth::routes();
Route::get('/pdfview/{id}', 'PdfGenerateController@pdfview')->name('generate-pdf');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/yourPosts', 'HomeController@yourPosts');


Route::get('/', 'DogsController@index');
Route::post('home', 'HomeController@Update_avatar');