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

Route::prefix('tests')->group(function () {
    Route::get('/', function () {
        echo 'test page';
    });

    Route::get('/form-page', function () {
        return view('examples.form-page');
    });
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Auth::routes();

Route::namespace('Web')->group(function() {
    Route::namespace('Util')->prefix('util')->group(function () {
        Route::get('images/background', 'ImagesController@background');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    Route::namespace('Gpus')->prefix('gpus')->group(function() {
        Route::get('/', 'GpusController@index')->name('gpus');
    });

    Route::namespace('Cpus')->prefix('cpus')->group(function() {
        Route::get('/', 'CpusController@index')->name('cpus');
    });
});
