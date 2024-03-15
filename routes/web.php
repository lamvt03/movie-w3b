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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/register','AuthController@showFormRegister')->name('showFormRegister');
Route::post('/register','AuthController@register')->name('register');
Route::get('/login','AuthController@showFormLogin')->name('showFormLogin');
Route::post('/login','AuthController@login')->name('login');
Route::get('logout','AuthController@logout')->name('logout');
Route::get('/search', 'HomeController@search')->name('search');

Route::group(['prefix' => 'video'], function(){
    Route::get('details', 'HomeController@videoDetails')->name('video.details');
    Route::get('watch', 'HomeController@videoWatch')->name('video.watch');
    Route::post('comment', 'HomeController@videoComment')->name('video.comment');
    Route::get('category', 'HomeController@videoCategory')->name('video.category');
});

Route::group(['prefix' => 'api/video'], function(){
    Route::get('commentList', 'API\VideoAPI@commentList');
    Route::get('like', 'API\VideoAPI@Like');
});

Route::group(['prefix' => 'payment'], function(){
    Route::get('vnp', 'PaymentController@getVnpPage');
    Route::get('vnp/return', 'PaymentController@vnpReturn');
});

