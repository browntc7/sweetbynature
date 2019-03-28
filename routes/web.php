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
Route::view('/welcome','welcome');
Route::view('/purchaseOrdersView','purchaseOrdersView');
Route::view('/purchaseOrdersCreate','purchaseOrdersCreate');
Route::view('/productionOrdersView','productionOrdersView');
Route::view('/productionOrdersCreate','productionOrdersCreate');
Route::view('/invoicesView','invoicesView');
Route::view('/productsPrint','productsPrint');
