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

// name your routes, so that you don't have to change your authentication if you change your URLs in the future
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//Route::get('pages/about', 'GameOneController@about')->name('pages.about');

Route::resource('/game1', 'GameOneController');
Route::resource('/game2', 'GameTwoController');
Route::resource('/game3', 'GameThreeController');
Route::resource('/game4', 'GameFourController');


Route::prefix('admin')->group(function() {
    Route::get('/add', 'Auth\AdminLoginController@add')->name('admin.choice-add');
    Route::post('/save', 'Auth\AdminLoginController@store')->name('admin.choice-save');
    Route::get('/view/{id}', 'Auth\AdminLoginController@view')->name('admin.choice-view');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    // this one needs to be last; otherwise, the ones before will get caught up in this one
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
