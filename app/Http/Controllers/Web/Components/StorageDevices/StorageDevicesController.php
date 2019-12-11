<?php namespace App\Http\Controllers\Web\Components\StorageDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\StorageDevices\NewStorageDeviceRequest;
use App\Http\Requests\Web\Components\StorageDevices\StorageDeviceRequest;
use App\Models\Base\StorageDeviceTypeQuery;
use App\Models\StorageDevice;
use Propel\Runtime\Exception\PropelException;
use View;

class StorageDevicesController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Storage Devices' => '#',
        ];

        return View::make('components.storage-devices.index')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function new()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Memory Devices' => route('components.memory-devices'),
            'New Memory Device' => '#'
        ];

        return View::make('components.memory-devices.new')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function datatable(StorageDeviceRequest $request)
    {
        $storageDevices = StorageDeviceTypeQuery::create()->find();
        $headers = [
            'name' => 'Name',
            'capacity' => 'Capacity',
            'cache' => 'Cache',
            'manufacturer' => ['Manufacturer', 'Name'],
            'interface_type' => ['InterfaceType', 'Name'],
            'storage_device_type' => ['StorageDeviceType', 'Name'],
            'storage_device_form_factor' => ['StorageDeviceType', 'Name'],
            'edit' => 'Edit'
        ];
        $rows = [];

        foreach ($storageDevices as $storageDevice) {
            $row = [];
            foreach ($headers as $headerName => $methodGetter) {
                if ($headerName != "edit") {
                    if (is_array($methodGetter)) {
                        $result = $storageDevice;
                        foreach ($methodGetter as $prop) {
                            $funk = sprintf('get%s', $prop);
                            $result = $result->$funk();
                        }

                        $row[$headerName] = $result;
                    } else {
                        $fName = sprintf('get%s', $methodGetter);
                        $row[$headerName] = $storageDevice->$fName();
                    }
                } else {
                    $html = sprintf('<a href="%s">Edit</a>', route('components.storage-devices.storage-device.edit', ['id' => $storageDevice->getId()]));
                    $row[$headerName] = $html;
                }
            }

            array_push($rows, $row);
        }

        return response()->json([
            'data' => $rows
        ], 200);
    }

    public function create(NewStorageDeviceRequest $request)
    {
        try {
            $storageDevice = new StorageDevice();
            $storageDevice->setManufacturer($request->getManufacturer())
                ->setStorageDeviceType($request->getStorageDeviceType())
                ->setInterfaceType($request->getInterfaceType())
                ->setStorageDeviceFormFactor($request->getStorageDeviceFormFactor())
                ->setName($request->get('name'))
                ->setCapacity($request->get('capacity'))
                ->setCache($request->get('cache'))
                ->save();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'New Storage Device added successfully'
        ]);

        return response()->json([
            'redirect' => route('components.storage-devices'),
            'message' => 'New Storage Device added successfully'
        ], 200);
    }
}
