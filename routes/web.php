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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('order', 'OrdersController');
Route::post('order/confirm', 'OrdersController@confirm')->name('order.confirm');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
Route::resource('orders', 'OrdersController');
});