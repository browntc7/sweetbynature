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


Route::view('/','welcome');

//automatically defines the authentication routes
Auth::routes();


//put all route to be protected by login here:
Route::group(['middleware' => ['auth']], function () {

//Class put your Web routes below this comment
Route::view('/table','table');
Route::view('/purchaseOrders','purchaseOrders/index');
Route::view('/purchaseOrders/print','purchaseOrders/print');
Route::view('/purchaseOrders/create','purchaseOrders/create');
Route::view('/productionOrders','productionOrders/index');
Route::view('/productionOrders/create','productionOrders/create');
Route::view('/productionOrders/print','productionOrders/print');
Route::view('/products','products/index');
Route::view('/products/print','products/print');
Route::view('/invoices','invoices/index');
Route::view('/invoices/print','invoices/print');
Route::view('/products','products/index');
Route::view('/products/print','products/print');
Route::view('/customers','customers/index');
Route::view('/customers/print','customers/print');
Route::view('/home', 'home')->name('home');
});