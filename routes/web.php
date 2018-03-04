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

Route::get('facture/{n}', 'ArticleController@show')->where('n', '[0-9]+');

Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');

Route::get('/', 'ContactController@getForm');
Route::post('/', 'ContactController@postForm');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');


Route::get('empty', function() {
  Cart::destroy();
});

//products' part
Route::get('/shop', 'ShopController@index')->name('shop.index');

Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
