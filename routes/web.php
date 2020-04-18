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


// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/foodmenu', function () {
// 	return view('foodmenu');
// });

// Frontend
Route::get('/', 'FrontendController@index')->name('welcome');
Route::get('/foodmenu', 'FrontendController@foodmenu');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/booktable', function () {
	return view('booktable');
});
Route::get('/branch', function () {
	return view('branch');
});

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	// Category
	Route::resource('categories', 'CategoryController');

	// Menu
	Route::resource('menus', 'MenuController');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});



