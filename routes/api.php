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

//Route::group(['middleware' => 'jwt.auth'], function () {
//  Route::resource('quotes', 'QuoteController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
//});

$allowed_methods = ['index', 'store', 'show', 'update', 'destroy'];

Route::resource('countries', 'CountryController', ['only' => $allowed_methods]);
Route::resource('currencies', 'CurrencyController', ['only' => $allowed_methods]);
Route::resource('invoices', 'InvoiceController', ['only' => $allowed_methods]);
Route::resource('invoice-categories', 'InvoiceCategoryController', ['only' => $allowed_methods]);

Route::post('/signup', 'UserController@register');
Route::post('/login', 'UserController@authenticate');
