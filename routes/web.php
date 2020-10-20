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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/' , 'ProfileController@index')->name('index');
Route::get('/show/{id}', 'ProfileController@show')->name('show');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', 'ProfileController@create')->name('create');
    Route::post('/profile/store', 'ProfileController@store')->name('store');

});

Route::get('/home', 'HomeController@index')->name('home');
