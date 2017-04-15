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


Route::post('/signup', 'UserController@register')->name('signup');

Route::post('/login', 'UserController@authenticate')->name('login');

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::resource('countries', 'CountryController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('currencies', 'CurrencyController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('invoices', 'InvoiceController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::post('invoices/{invoice}/images', 'InvoiceController@uploadImage')->name('invoices.uploadImage');

    Route::resource('invoice-categories', 'InvoiceCategoryController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('invoice-payment-methods', 'InvoicePaymentMethodController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('surveys', 'SurveyController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);

    Route::resource('survey-answers', 'SurveyAnswerController', ['only' => ['index', 'show', 'update', 'destroy']]);

    Route::get('surveys/{survey}/answers', 'SurveyAnswerController@indexBySurvey')->name('survey-answers.indexBySurvey');

    Route::post('surveys/{survey}/answers', 'SurveyAnswerController@store')->name('survey-answers.store');

});