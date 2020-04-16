<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/foodmenu', function () {
	return view('foodmenu');
});
Route::get('/booktable', function () {
	return view('booktable');
});
Route::get('/branch', function () {
	return view('branch');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Category
Route::resource('/category', 'CategoryController');
Route::get('/showcategory', 'CategoryController@index')->name('showcategory');

// Menu
Route::resource('/menu', 'MenuController');
Route::get('/showcmenu', 'MenuController@index')->name('showmenu');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});



