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
Route::get('/download', 'FrontendController@downloadPDF')->name('download');
Route::get('/branch', 'FrontendController@branch');

//Cart
Route::get('/add_to_cart/{id}', 'FrontendController@getAddToCart')->name('addtocart');
Route::get('/add_quantity_to_cart/{id}', 'FrontendController@getAddQuantityToCart')->name('addquantitytocart');
Route::get('/reduce_quantity_to_cart/{id}', 'FrontendController@getReduceQuantityToCart')->name('reducequantitytocart');
Route::get('/cart', 'FrontendController@getCart')->name('getcart');
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
Route:: get('/newreceipt', function (){
	return view('newreceipt');
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
Route:: get('/receipt', 'FrontendController@receipt');
Route::resource('feedback', 'FeedbackController');

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
	Route::PUT('/reservation_confirm/{reservation}/reservation_confirm', 'ReservationController@Confirm')->name('reservation_confirm');
	Route::PUT('/reservation_declined/{reservation}/reservation_declined', 'ReservationController@declined')->name('reservation_declined');

	//Order
	Route::resource('orders', 'OrderController');
	Route::PUT('/orders_confirm/{order}/order_confirm', 'OrderController@Confirm')->name('orders_confirm');
	Route::PUT('/orders_declined/{order}/order_declined', 'OrderController@Declined')->name('orders_declined');

	//Reservation With Order
	Route::resource('reservationwithorders', 'ReservationWithOrderController');
	Route::PUT('/reservationwithorders_confirm/{reservationwithorder}/reservation_with_order_confirm', 'ReservationWithOrderController@Confirm')->name('reservationwithorders_confirm');
	Route::PUT('/reservationwithorders_declined/{reservationwithorder}/reservation_with_order_declined', 'ReservationWithOrderController@Declined')->name('reservationwithorders_declined');

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	
});

Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);