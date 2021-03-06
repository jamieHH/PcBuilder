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
            Route::middleware('auth')->group(function() {
                Route::get('/{id}/edit', 'ProcessorsController@edit')->name('components.processors.processor.edit');
                Route::post('/{id}/edit', 'ProcessorsController@update')->name('components.processors.processor.edit.post');
                Route::post('/{id}/delete', 'ProcessorsController@delete')->name('components.processors.processor.delete.post');

                Route::get('/new', 'ProcessorsController@new')->name('components.processors.new');
                Route::post('/new', 'ProcessorsController@create')->name('components.processors.new.post');
            });

            Route::get('/{id}/details', 'ProcessorsController@details')->name('components.processors.processor.details');

            Route::get('/datatable', 'ProcessorsController@datatable')->name('components.processors.datatable');
            Route::get('/', 'ProcessorsController@index')->name('components.processors');
        });

        Route::namespace('Motherboards')->prefix('motherboards')->group(function() {
            Route::middleware('auth')->group(function() {
                Route::get('/{id}/edit', 'MotherboardsController@edit')->name('components.motherboards.motherboard.edit');
                Route::post('/{id}/edit', 'MotherboardsController@update')->name('components.motherboards.motherboard.edit.post');
                Route::post('/{id}/delete', 'MotherboardsController@delete')->name('components.motherboards.motherboard.delete.post');

                Route::get('/new', 'MotherboardsController@new')->name('components.motherboards.new');
                Route::post('/new', 'MotherboardsController@create')->name('components.motherboards.new.post');
            });

            Route::get('/{id}/details', 'MotherboardsController@details')->name('components.motherboards.motherboard.details');

            Route::get('/datatable', 'MotherboardsController@datatable')->name('components.motherboards.datatable');
            Route::get('/', 'MotherboardsController@index')->name('components.motherboards');
        });

        Route::namespace('MemoryDevices')->prefix('memory-devices')->group(function() {
            Route::middleware('auth')->group(function() {
                Route::get('/{id}/edit', 'MemoryDevicesController@edit')->name('components.memory-devices.memory-device.edit');
                Route::post('/{id}/edit', 'MemoryDevicesController@update')->name('components.memory-devices.memory-device.edit.post');
                Route::post('/{id}/delete', 'MemoryDevicesController@delete')->name('components.memory-devices.memory-device.delete.post');

                Route::get('/new', 'MemoryDevicesController@new')->name('components.memory-devices.new');
                Route::post('/new', 'MemoryDevicesController@create')->name('components.memory-devices.new.post');
            });

            Route::get('/{id}/details', 'MemoryDevicesController@details')->name('components.memory-devices.memory-device.details');

            Route::get('/datatable', 'MemoryDevicesController@datatable')->name('components.memory-devices.datatable');
            Route::get('/', 'MemoryDevicesController@index')->name('components.memory-devices');
        });

        Route::namespace('StorageDevices')->prefix('storage-devices')->group(function() {
            Route::middleware('auth')->group(function() {
                Route::get('/{id}/edit', 'StorageDevicesController@edit')->name('components.storage-devices.storage-device.edit');
                Route::post('/{id}/edit', 'StorageDevicesController@update')->name('components.storage-devices.storage-device.edit.post');
                Route::post('/{id}/delete', 'StorageDevicesController@delete')->name('components.storage-devices.storage-device.delete.post');

                Route::get('/new', 'StorageDevicesController@new')->name('components.storage-devices.new');
                Route::post('/new', 'StorageDevicesController@create')->name('components.storage-devices.new.post');
            });

            Route::get('/{id}/details', 'StorageDevicesController@details')->name('components.storage-devices.storage-device.details');

            Route::get('/datatable', 'StorageDevicesController@datatable')->name('components.storage-devices.datatable');
            Route::get('/', 'StorageDevicesController@index')->name('components.storage-devices');
        });

        Route::namespace('Gpus')->prefix('gpus')->group(function() {
            Route::get('/', 'GpusController@index')->name('components.gpus');
        });

        Route::get('/', 'ComponentsController@index')->name('components');
    });

    Route::middleware('auth')->group(function() {
        Route::namespace('Systems')->prefix('systems')->group(function () {
            Route::get('/', 'SystemsController@index')->name('systems');
        });

        Route::namespace('Inventories')->prefix('inventories')->group(function () {
            Route::get('/', 'InventoriesController@index')->name('inventories');
        });

        Route::namespace('Lists')->prefix('lists')->group(function () {
            Route::get('/', 'ListsController@index')->name('lists');
        });
    });

    Route::namespace('Misc')->prefix('misc')->group(function () {
        Route::get('/manufacturers/select2', 'Manufacturers\ManufacturersController@select2')->name('misc.manufacturers.select2');
        Route::get('/memory-speeds/select2', 'MemorySpeeds\MemorySpeedsController@select2')->name('misc.memory-speeds.select2');
        Route::get('/memory-types/select2', 'MemoryTypes\MemoryTypesController@select2')->name('misc.memory-types.select2');
        Route::get('/cpu-sockets/select2', 'CpuSockets\CpuSocketsController@select2')->name('misc.cpu-sockets.select2');
        Route::get('/storage-interface-types/select2', 'StorageInterfaceTypes\StorageInterfaceTypesController@select2')->name('misc.storage-interface-types.select2');
        Route::get('/storage-device-types/select2', 'StorageDeviceTypes\StorageDeviceTypesController@select2')->name('misc.storage-device-types.select2');
        Route::get('/storage-device-form-factors/select2', 'StorageDeviceFormFactors\StorageDeviceFormFactorsController@select2')->name('misc.storage-device-form-factors.select2');

        Route::get('/motherboard-form-factors/select2', 'MotherboardFormFactors\MotherboardFormFactorsController@select2')->name('misc.motherboard-form-factors.select2');
        Route::get('/mainboard-chipsets/select2', 'MainboardChipsets\MainboardChipsetsController@select2')->name('misc.mainboard-chipsets.select2');
    });

    Route::get('/home', function () {
        return redirect(route('dashboard'));
    });

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/', 'Controller@index')->name('root');
});