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

Route::prefix('test')->group(function () {
    Route::get('/', function () {
        echo 'test page';
    });

    Route::get('/form-page', function () {
        return view('example.form-page');
    });
});

Route::get('/phpinfo', function () {
    phpinfo();
});

Auth::routes();

Route::prefix('images')->group(function () {
    Route::get('background', 'ImagesController@background');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/gpus/search', 'Gpus\GpusController@getIndex')->name('gpus.search');
