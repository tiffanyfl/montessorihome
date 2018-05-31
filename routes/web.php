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

use Gloudemans\Shoppingcart\Facades\Cart;

Route::get('/', 'ContactController@getForm');
Route::post('/', 'ContactController@postForm');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');


Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('empty', function() {
  Cart::destroy();
});

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

//products' part
Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/search', 'ShopController@search')->name('search');

Route::get('/404', function () {
    return view('404');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profil','UsersController@getInfos')->name('users.index');
Route::get('/profil/modify','UsersController@edit')->name('users.modify');
Route::post('/profil/modify','UsersController@update')->name('users.update');

Route::get('/mentions-legales', function() { return view('mentions-legales');})->name('mentions-legales');
Route::get('/conditions-generales-de-vente', function() { return view('cgv');})->name('cgv');
