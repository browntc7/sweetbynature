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

Route::get('/home', 'HomeController@index')->name('home');

//Class put your Web routes below this comment
Route::view('/table','table');
Route::view('/purchaseOrders','purchaseOrders/index');
Route::view('/purchaseOrders/create','purchaseOrders/create');
Route::view('/productionOrders','productionOrders/index');
Route::view('/productionOrders/create','productionOrders/create');
Route::view('/invoices','invoices/index');
Route::view('/invoices/print','invoices/print');
Route::view('/products','products/index');
Route::view('/products/print','products/print');
Route::view('/customers','customers/index');
Route::view('/customers/print','customers/print');
