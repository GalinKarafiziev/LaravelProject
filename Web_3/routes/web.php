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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


Route::get('/', 'DogsController@index');
Route::resource('dogs', 'DogsController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/yourPosts', 'HomeController@yourPosts');

Route::get('/pdfview/{id}', 'PdfGenerateController@pdfview')->name('generate-pdf');
Route::get('/download', function(){return Excel::download(new UsersExport, 'users.xlsx');});

//Route::get('/', 'DogsController@index');
Route::post('home', 'HomeController@Update_avatar');

// API-routes
Route::get('/getallusers', 'UserControllers@index');
Route::delete('/deleteuser', 'UserControllers@delete');
Route::patch('/updateuser', 'UserControllers@update');
Route::post('/adduser', 'UserControllers@create');
Route::get('/user/{id}', 'UserControllers@user');
