<?php namespace App\Http\Controllers\Web\Components\StorageDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\StorageDevices\NewStorageDeviceRequest;
use App\Http\Requests\Web\Components\StorageDevices\StorageDeviceRequest;
use App\Http\Requests\Web\Components\StorageDevices\UpdateStorageDeviceRequest;
use App\Models\Base\StorageDeviceQuery;
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
            'Storage Devices' => route('components.storage-devices'),
            'New Storage Device' => '#'
        ];

        return View::make('components.storage-devices.new')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function datatable(StorageDeviceRequest $request)
    {
        $storageDevices = StorageDeviceQuery::create()->find();
        $headers = [
            'name' => 'Name',
            'capacity' => 'Capacity',
            'cache' => 'Cache',
            'manufacturer' => ['Manufacturer', 'Name'],
            'storageInterfaceType' => ['StorageInterfaceType', 'Name'],
            'storageDeviceType' => ['StorageDeviceType', 'Name'],
            'storageDeviceFormFactor' => ['StorageDeviceFormFactor', 'Name'],
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
                ->setStorageInterfaceType($request->getStorageInterfaceType())
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

    public function edit(StorageDeviceRequest $request, $id)
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Storage Devices' => route('components.storage-devices'),
            'Edit Storage Device' => '#',
        ];

        return View::make('components.storage-devices.edit', ['id' => $id])
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function details(StorageDeviceRequest $request)
    {
        $storageDevice = $request->getStorageDevice();
        return response()->json([
            "data" => [
                "id" => $storageDevice->getId(),
                "name" => $storageDevice->getName(),
                "manufacturer_id" => $storageDevice->getManufacturerId(),
                "storage_interface_type_id" => $storageDevice->getStorageInterfaceTypeId(),
                "storage_device_type_id" => $storageDevice->getStorageDeviceTypeId(),
                "storage_device_form_factor_id" => $storageDevice->getStorageDeviceFormFactorId(),
                "capacity" => $storageDevice->getCapacity(),
                "cache" => $storageDevice->getCache()
            ]
        ], 200);
    }

    public function update(UpdateStorageDeviceRequest $request)
    {
        try {
            $storageDevice = $request->getStorageDevice();
            $storageDevice->setManufacturer($request->getManufacturer())
                ->setStorageDeviceType($request->getStorageDeviceType())
                ->setStorageInterfaceType($request->getStorageInterfaceType())
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
            'message' => 'Storage Device updated successfully'
        ]);

        return response()->json([
            'redirect' => route('components.storage-devices'),
            'message' => 'Storage Device updated successfully'
        ], 200);
    }

    public function delete(StorageDeviceRequest $request)
    {
        try {
            $request->getStorageDevice()->delete();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'Storage Device deleted successfully'
        ]);

        return response()->json([
            'redirect' => route('components.storage-devices'),
            'message' => 'Storage Device deleted successfully'
        ], 200);
    }
}
