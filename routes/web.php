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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('/users', 'User\UserController');
Route::resource('/products', 'Product\ProductController');

Route::resource('/orders', 'Order\OrderController');
Route::get('/orders/{order}/payflow', 'Flow\FlowController@payOrder')->name('orders.payflow');

