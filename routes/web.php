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
    Route::namespace('Components')->middleware('auth')->prefix('components')->group(function() {
        Route::namespace('Processors')->prefix('processors')->group(function() {
            Route::get('/processor/{id}/details', 'ProcessorController@details')->name('components.processors.processor.details');
            Route::get('/processor/{id}/edit', 'ProcessorController@edit')->name('components.processors.processor.edit');
            Route::post('/processor/{id}/edit', 'ProcessorController@update')->name('components.processors.processor.edit.post');
            Route::post('/processor/{id}/delete', 'ProcessorController@delete')->name('components.processors.processor.delete.post');

            Route::get('/datatable', 'ProcessorsController@datatable')->name('components.processors.datatable');
            Route::get('/new', 'ProcessorsController@new')->name('components.processors.new');
            Route::post('/new', 'ProcessorsController@create')->name('components.processors.new.post');
            Route::get('/', 'ProcessorsController@index')->name('components.processors');
        });

        Route::namespace('Motherboards')->prefix('motherboards')->group(function() {
            Route::get('/', 'MotherboardsController@index')->name('components.motherboards');
        });

        Route::namespace('MemoryDevices')->prefix('memory-devices')->group(function() {
            Route::get('/', 'MemoryDevicesController@index')->name('components.memory-devices');
        });

        Route::namespace('StorageDevices')->prefix('storage-devices')->group(function() {
            Route::get('/', 'StorageDevicesController@index')->name('components.storage-devices');
        });

        Route::namespace('Gpus')->prefix('gpus')->group(function() {
            Route::get('/', 'GpusController@index')->name('components.gpus');
        });

        Route::get('/', 'ComponentsController@index')->name('components');
    });

    Route::namespace('Systems')->prefix('systems')->group(function() {
        Route::get('/', 'SystemsController@index')->name('systems');
    });

    Route::namespace('Inventories')->prefix('inventories')->group(function() {
        Route::get('/', 'InventoriesController@index')->name('inventories');
    });

    Route::namespace('Lists')->prefix('lists')->group(function() {
        Route::get('/', 'ListsController@index')->name('lists');
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/', 'Controller@index')->name('root');
});