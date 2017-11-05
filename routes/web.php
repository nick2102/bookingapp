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

Route::get('/', 'MainController@index')->name('app.home');
Route::get('/checkout', 'MainController@checkout')->name('app.checkout');
Route::get('/reservations', 'MainController@reservations')->name('app.reservations');
Route::post('/submit', 'MainController@submit')->name('app.submit');
Route::post('/checkout/pay', 'MainController@checkoutAction')->name('app.checkout.action');

