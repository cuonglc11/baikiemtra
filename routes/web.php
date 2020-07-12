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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/importFile','HomeController@importFile')->name('importFile');
Route::post('/importFile','HomeController@importExcel');
Route::get('/mk', 'QuenController@getMatkhau')->name('mk');
Route::post('/mk', 'QuenController@postMatkhau');
Route::get('/newAccont', 'HomeController@newAccont')->name('newAccont');
Route::post('/newAccont', 'HomeController@postAccont');
Route::get('/getRegister', 'QuenController@getRegister')->name('getRegister');
Route::post('/getRegister', 'QuenController@postRegister');
Route::get('/loginUser', 'QuenController@getlogin')->name('loginUser');
Route::post('/loginUser', 'QuenController@postlogin');
Route::get('/doimk/{user}', 'UserController@doimk')->name('doimk/{user}');
Route::post('/doimk/{user}', 'UserController@postdoimk');
Route::get('/username/{user}','UserController@username')->name('/username/{user}');
Route::get('/edit/{id}', 'UserController@getEdit')->name('edit/{id}');
Route::post('/edit/{id}', 'UserController@postEdit');
Route::post('reset-password', 'ResetPasswordController@sendMail');
Route::put('password/{token}/{email}', 'ResetPasswordController@reset');





