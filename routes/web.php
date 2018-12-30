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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@test')->name('test');


/**
 * UserGroupController
 */
Route::resource('user-group', 'UserGroupController');

/**
 * UserController
 */
Route::get('user/{user}/generate-token', 'UserController@generateToken')->name('user.generate-token');
Route::resource('user', 'UserController');

/**
 * ProfileController
 */
Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@index')->name('profile');
    Route::put('/{user}', 'ProfileController@profileUpdate')->name('profile.update');
    Route::post('/{user}/change-password', 'ProfileController@changePassword')->name('profile.change-password');
    Route::get('/generate-token', 'ProfileController@generateToken')->name('profile.generate-token');
});
