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
    return view('web.home');
});



//Giac admin

Route::get('/admin', 'AdminController@index')->name('admin.login'); //index

Route::post('/admin', 'AdminController@login')->name('login'); //login


Route::get('/test', 'AdminController@testDB'); //test


Route::get('/admin/dashboard', 'AdminController@showDashboard')->name('admin.dashboard')->middleware('auth'); //dashboard

Route::get('/admin/videos', 'AdminController@showVideoList'); //danh sách phim

Route::get('/admin/video/add', 'AdminController@addVideoForm')->name('admin.video.add'); //form thêm phim

Route::post('/admin/video/add', 'AdminController@addVideo')->name('admin.video.store'); //lưu phim

Route::get('/admin/video/edit/{id}', 'AdminController@editVideoForm')->name('admin.video.edit'); //form sửa phim

Route::post('/admin/video/edit/{id}', 'AdminController@update')->name('admin.video.update'); //update

Route::post('/admin/video/{id}/deactivate', 'AdminController@deactivateVideo')->name('admin.video.deactivate'); //ngừng công chiếu

Route::get('/admin/videos/disabled', 'AdminController@disabledList')->name('admin.video.disabled'); //phim disabled

Route::post('/admin/video/restore', 'AdminController@restore')->name('admin.video.restore'); //khôi phục phim

Route::get('/admin/users', 'AdminController@showUserList')->name('admin.users'); //danh sách user

Route::get('/admin/user/update/{id}', 'AdminController@updateUserForm')->name('admin.user.edit'); //form sửa user

Route::post('/admin/user/update/{id}', 'AdminController@updateUser')->name('admin.user.update'); //update user

Route::get('/admin/videos/liked', 'AdminController@likedVideoList'); //lượt thích các phim

Route::get('/admin/userlike', 'AdminController@userLiked')->name('userlike'); //người dùng thích

Route::get('/admin/videos/userlike', 'AdminController@userLiked')->name('userlike'); //người dùng thích

Route::get('/admin/doanhthu', 'AdminController@revenue')->name('revenue'); //doanh thu
Route::get('/admin/videos/doanhthu', 'AdminController@revenue')->name('revenue'); //doanh thu

Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');



