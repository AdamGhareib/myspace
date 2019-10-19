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
Route::resource('profile', 'UserController');

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// home
Route::get('/', 'HomeController@index2')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{username}', 'HomeController@showprofile');

// profile
Route::get('editprofile', 'UserController@editProfile')->name('editprofile');
Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile', 'UserController@update_avatar')->name('profile.update_avatar');
Route::get('/profile/{username}', 'UserController@show')->name('show_profile');

// search
Route::post('/autocomplete/fetch', 'SearchController@fetch')->name('autocomplete.fetch');

// Route::get();
