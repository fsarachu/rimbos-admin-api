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

/* Admin Routes */
Route::group(['domain' => env('APP_ADMIN_DOMAIN')], function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.index');

    Route::resource('invoices', 'Admin\InvoiceController', ['as' => 'admin']);
    Route::resource('surveys', 'Admin\SurveyController', ['as' => 'admin']);
    Route::resource('surveys.answers', 'Admin\SurveyAnswerController', ['as' => 'admin']);

    Route::get('/storage/{file_name}', 'Admin\FileController')->where(['file_name' => '.*'])->name('admin.storage');

    //Auth::routes();

    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');

    Route::post('/login', 'Auth\LoginController@login');

    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});

/* Surveys Routes */
Route::group(['domain' => env('APP_SURVEY_DOMAIN')], function () {
    Route::get('/auth', 'Front\AuthController@authenticate')->name('survey.auth');

    Route::get('/', 'Front\SurveyController@show')->name('survey.show');
    Route::post('/', 'Front\SurveyController@answer')->name('survey.answer');
});