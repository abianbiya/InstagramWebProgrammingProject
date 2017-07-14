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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/explore', 'HomeController@explore')->name('explore');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/follow', 'HomeController@follow')->name('follow');
Route::get('/followers/{id}', 'HomeController@followers')->name('followers');
Route::get('/following/{id}', 'HomeController@following')->name('following');
Route::post('/unfollow', 'HomeController@unfollow')->name('unfollow');
Route::get('/{username}', 'HomeController@profileByName')->name('profile.by.name');
Route::get('/post/{id}', 'HomeController@detailPost')->name('post');
