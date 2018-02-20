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

Auth::routes();

Route::namespace('Web')->group(function() {
    Route::namespace('Components')->prefix('components')->group(function() {
        Route::namespace('Processors')->prefix('processors')->group(function() {

            Route::get('/json', 'ProcessorsController@json')->name('components.processors.json');
            Route::get('/new', 'ProcessorsController@new')->name('components.processors.new');
            Route::get('/', 'ProcessorsController@index')->name('components.processors');
        });

        Route::namespace('Gpus')->prefix('gpus')->group(function() {

            Route::get('/json', 'GpusController@json')->name('components.gpus.json');
            Route::get('/', 'GpusController@index')->name('components.gpus');
        });

        Route::get('/', 'ComponentsController@index')->name('components');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/', 'Controller@index')->name('root');
});