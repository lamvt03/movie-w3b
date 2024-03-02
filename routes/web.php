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

