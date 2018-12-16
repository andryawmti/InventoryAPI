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
Route::get('profile', 'ProfileController@get')->name('profile');
