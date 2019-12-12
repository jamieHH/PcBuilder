<?php namespace App\Http\Controllers\Web\Components\StorageDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\StorageDevices\StorageDeviceRequest;
use App\Http\Requests\Web\Components\StorageDevices\UpdateStorageDeviceRequest;
use Propel\Runtime\Exception\PropelException;
use View;

class StorageDeviceController extends Controller
{
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
                "interface_type_id" => $storageDevice->getInterfaceTypeId(),
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
