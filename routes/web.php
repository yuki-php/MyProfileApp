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

//詳細ページ
Route::get('/show/{id}', 'ProfileController@show')->name('show');

//検索ページ
Route::post('/search', 'ProfileController@search')->name('search');


//お問い合わせフォーム
Route::get('/contact', 'ProfileController@contact')->name('contact');
Route::post('/confirm', 'ProfileController@ses_put')->name('ses_put');
Route::get('/confirm', 'ProfileController@confirm')->name('confirm');
Route::post('/confirm/send', 'ProfileController@send')->name('send');



//ログイン必須の機能
Route::group(['middleware' => 'auth'], function () {

    //投稿機能
    Route::get('/profile', 'ProfileController@create')->name('create');
    Route::post('/profile/store', 'ProfileController@store')->name('store');

    //編集機能
    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::post('/edit/update', 'ProfileController@update')->name('update');

    //削除機能
    Route::get('/delete', 'ProfileController@delete')->name('delete');
    Route::post('/delete/remove', 'ProfileController@remove')->name('remove');

});

Route::get('/home', 'HomeController@index')->name('home');
