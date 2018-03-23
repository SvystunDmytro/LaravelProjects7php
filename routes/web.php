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

Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);
Route::resource('/contact', 'ContactController');

Route::group(['prefix' => 'news'], function () {
    Route::get('/', ['as' => 'news', 'uses' => 'NewsController@index']);
    Route::post('/addcomment', ['as' => 'addcomment', 'uses' => 'NewsController@addcomment']);
    Route::get('/{id}', ['as' => 'newsid', 'uses' => 'NewsController@show'])->where(['id' => '[0-9]+']);
    Route::get('/category/{category_id}', ['as' => 'category_id', 'uses' => 'NewsController@category_id'])->where(['category_id' => '[0-9]+']);;

});

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('home');
    Route::resource('news', 'Admin\NewsController');
    Route::delete('/{id}', 'Admin\AdminController@destroy');
    Route::get('news/{id}/edit', 'Admin\NewsController@edit')->where(['id' => '[0-9]+']);

});


//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();
//
//Route::get('/admin', 'HomeController@index')->name('home');
