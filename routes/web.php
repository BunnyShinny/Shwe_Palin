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
Route::POST('/send-push', 'UserController@sendPush')->name('send-push');

Route::get('/foodmenu', 'FrontendController@foodmenu')->name('foodmenu');
Route::get('/branch', 'FrontendController@branch');

//Cart
Route::get('/add_to_cart/{id}', 'FrontendController@getAddToCart')->name('addtocart');
Route::get('/cart', 'FrontendController@getCart');
Route::get('/deletecart', 'FrontendController@deleteCart')->name('deletecart');
Route::get('/deleteitemfromcart/{id}', 'FrontendController@deleteItemFromCart')->name('deleteitemfromcart');
Route::get('/checkout', 'FrontendController@getCartToCheckout')->name('checkout');
Route::POST('/checkout', 'FrontendController@postCartToCheckout')->name('postcheckout');


//Booking
Route::get('/booktable', 'FrontendController@reservation');
Route::POST('/booktablesave', 'FrontendController@save_reservation')->name('booktablesave');
Route::POST('/booktable_with_ordersave', 'FrontendController@booktable_with_ordersave')->name('booktablewithordersave');

Route::POST('/save-device-token', 'UserController@saveToken');
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/accountsetting', function () {
    return view('accountsetting');
});


// Route::get('/cart', function (){
// 	return view('cart');
// });
// Route::get('/checkout', function (){
// 	return view('checkout');
// });
Route:: get('/thankyou', function (){
	return view('thankyou');
});
Route:: get('/bookdisplay', function (){
	return view('bookdisplay');
});
Route:: get('/accountsetting', function (){
	return view('accountsetting');
});
Route:: get('/receipt', function (){
	return view('receipt');
});

Auth::routes();

Route::group(['middleware' => ['role:admin']], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	
	// Category
	Route::resource('categories', 'CategoryController');
	Route::resource('branches', 'BranchController');

	// Menu
	Route::resource('menus', 'MenuController');

	// Reservation
	Route::resource('reservations', 'ReservationController');

	//Order
	Route::resource('orders', 'OrderController');
	Route::PUT('/orders_confirm/{order}/order_confirm', 'OrderController@Confirm')->name('orders_confirm');

	//Reservation With Order
	Route::resource('reservationwithorders', 'ReservationWithOrderController');
	Route::PUT('/reservationwithorders_confirm/{reservationwithorder}/reservation_with_order_confirm', 'ReservationWithOrderController@Confirm')->name('reservationwithorders_confirm');

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	
});

Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);



