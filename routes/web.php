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

Route::get('/', 'DefaultController@index')->name('default');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile/{profile}', 'ProfileController@update')->name('friends.update');
Route::resource('/profile/gallery','GalleryController');

Route::resource('profile/gallery/photos','PhotoController');

Route::get('/profile/setting/', 'UserController@show')->name('users.show');
Route::patch('/profile/setting/{id}', 'UserController@store')->name('users.store');
