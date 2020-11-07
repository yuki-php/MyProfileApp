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

Route::post('/search', 'ProfileController@search')->name('search');



Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile', 'ProfileController@create')->name('create');
    Route::post('/profile/store', 'ProfileController@store')->name('store');

    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::post('/edit/update', 'ProfileController@update')->name('update');

    Route::get('/delete', 'ProfileController@delete')->name('delete');
    Route::post('/delete/remove', 'ProfileController@remove')->name('remove');

});

Route::get('/home', 'HomeController@index')->name('home');
