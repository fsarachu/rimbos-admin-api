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


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group(['domain' => env('APP_ADMIN_DOMAIN')], function () {
    Route::get('/', 'Admin\HomeController@index')->name('admin.index');
    Route::resource('invoices', 'Admin\InvoiceController', ['as' => 'admin']);
    Route::resource('surveys', 'Admin\SurveyController', ['as' => 'admin']);
    Route::get('/surveys/{survey}/delete', 'Admin\SurveyController@delete')->name('admin.surveys.delete');
    Route::get('/surveys/{survey}/preview', 'Admin\SurveyController@preview')->name('admin.surveys.preview');
    Route::resource('surveys.answers', 'Admin\SurveyAnswerController', ['as' => 'admin']);
    //Auth::routes();
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/storage/{file_name}', 'Admin\FileController')->where(['file_name' => '.*'])->name('admin.storage');
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::group(['domain' => env('APP_SURVEY_DOMAIN')], function () {
    Route::get('/auth', 'Front\Surveys\AuthController@authenticate')->name('survey.auth');
    Route::get('/', 'Front\Surveys\SurveyController@show')->name('survey.show');
    Route::post('/', 'Front\Surveys\SurveyController@submit')->name('survey.submit');
    Route::get('/thanks', 'Front\Surveys\SurveyController@thanks')->name('survey.thanks');
});