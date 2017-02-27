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

Route::get('/', 'PeminjamansController@index');

// Auth 
Route::group([
    'namespace' => 'Auth',
], function () {
	Route::get('login', 'LoginController@showLoginForm');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');

    Route::group(['prefix' => 'password'], function () {
        // Forgot password
        Route::get('forgot', 'ForgotPasswordController@showLinkRequestForm')->name('auth.password.forgot');
        Route::post('forgot', 'ForgotPasswordController@sendResetLinkEmail')->name('auth.password.forgot.store');

        // Forgot password
        Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('auth.password.reset');
        Route::post('reset', 'ResetPasswordController@reset')->name('auth.password.reset.store');
    });    
});


Route::get('/home', 'HomeController@index');

Route::resource('books', 'BooksController',[
	'except' => 'show'
]);
Route::resource('users', 'UsersController',[
	'except' => 'show'
]);
Route::resource('peminjamans', 'PeminjamansController',[
	'except' => 'show'
]);