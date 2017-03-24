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

Route::get('/', 'HomeController');

Route::resource('invoices', 'InvoiceController');

Route::get('/storage/{file_name}', 'FileController')->where(['file_name' => '.*']);