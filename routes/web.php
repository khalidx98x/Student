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

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
});
//Route::group(['prefix' => 'admin'], function () {
//    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
//    Route::post('/login', 'AdminAuth\LoginController@login');
//    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');
//
//    Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('/register', 'AdminAuth\RegisterController@register');
//
//    Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//    Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
//    Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//    Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
//});


//Route::get('/test', function () {
//    return view('test');
//});



//Route::group(['prefix' => 'student'], function () {
//    Auth::routes();
//
//});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EmployeeAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EmployeeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
  Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'StudentAuth\LoginController@login');
  Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'StudentAuth\RegisterController@register');

  Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});
