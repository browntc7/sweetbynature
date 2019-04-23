<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['auth:api']], function () {
    
Route::get('/user', function (Request $request) {
        return $request->user();
    });

});


//Class put your API routes below this comment
Route::get('/raw/json','ApiController@getThings');
Route::post('/addCustomer','ApiController@addCustomer');
Route::get('/customers', 'ApiController@getCustomers');
Route::put('/customer/edit/{id}', 'ApiController@editCustomer');
Route::get('/purchaseOrders', 'ApiController@getPurchaseOrders');
Route::get('/invoices', 'ApiController@getInvoices');
Route::get('/invoices/{id}', 'ApiController@getInvoiceDetail');
Route::get('/inventory', 'ApiController@getInventory');
Route::get('/inventory/{id}', 'ApiController@getInventoryDetail');
Route::get('/productionOrders', 'ApiController@getProductionOrders');
Route::get('/products', 'ApiController@getProducts');
