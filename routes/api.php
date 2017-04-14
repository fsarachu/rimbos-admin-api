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

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::resource('countries', 'CountryController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('currencies', 'CurrencyController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('invoices', 'InvoiceController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('invoice-categories', 'InvoiceCategoryController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
    Route::resource('invoice-payment-methods', 'InvoicePaymentMethodController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});

Route::post('/signup', 'UserController@register');
Route::post('/login', 'UserController@authenticate');
