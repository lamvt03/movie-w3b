<?php
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;

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
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/register',[AuthController::class,'showFormRegister'])->name('showFormRegister');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::get('/login',[AuthController::class,'showFormLogin'])->name('showFormLogin');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/forgot-password',[ForgotPasswordController::class,'showForgotPassPage'])->name('showForgotPassPage');
Route::post('/forgot-password',[ForgotPasswordController::class,'checkExistedEmail'])->name('checkExistedEmail');
Route::get('/forgot-password/enter-otp',[ForgotPasswordController::class,'showEnterOTPPage'])->name('showEnterOTPPage');
Route::post('/forgot-password/sending-otp',[ForgotPasswordController::class,'sendOtp'])->name('sendOtp');
Route::post('/forgot-password/enter-otp',[ForgotPasswordController::class,'verifiedOtp'])->name('verifiedOtp');
Route::get('/forgot-password/new-password',[ResetPasswordController::class,'showNewPassPage'])->name('showNewPassPage');
Route::post('/forgot-password/new-password',[ResetPasswordController::class,'setNewPass'])->name('setNewPass');
Route::get('user/activation/{token}', [AuthController::class,'activateUser'])->name('user.activate');
Route::get('/verify-success',[VerificationController::class,'showSuccess'])->name('verify-success');
Route::get('/transaction',[TransactionController::class,'showTransaction'])->name('transaction');
Route::group(['prefix' => 'video'], function(){
    Route::get('details', 'HomeController@videoDetails')->name('video.details');
    Route::get('watch', 'HomeController@videoWatch')->name('video.watch');
    Route::post('comment', 'HomeController@videoComment')->name('video.comment');
    Route::get('category', 'HomeController@videoCategory')->name('video.category');
});

Route::group(['prefix' => 'api/video'], function(){
    Route::get('commentList', 'API\VideoAPI@commentList');
    Route::get('like', 'API\VideoAPI@like');
});

Route::group(['prefix' => 'payment'], function(){
    Route::get('vnp', 'PaymentController@getVnpPage');
    Route::get('vnp/return', 'PaymentController@vnpReturn');
});

Route::group(['prefix' => 'payment'], function(){
    Route::get('vnp', 'PaymentController@getVnpPage');
    Route::get('vnp/return', 'PaymentController@vnpReturn');
});
