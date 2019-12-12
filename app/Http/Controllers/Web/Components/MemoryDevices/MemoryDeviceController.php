<?php namespace App\Http\Controllers\Web\Components\MemoryDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\MemoryDevices\MemoryDeviceRequest;
use App\Http\Requests\Web\Components\MemoryDevices\UpdateMemoryDeviceRequest;
use Propel\Runtime\Exception\PropelException;
use View;

class MemoryDeviceController extends Controller
{
    public function edit(MemoryDeviceRequest $request, $id)
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Memory Devices' => route('components.memory-devices'),
            'Edit Memory Device' => '#',
        ];

        return View::make('components.memory-devices.edit', ['id' => $id])
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function details(MemoryDeviceRequest $request)
    {
        $cpu = $request->getRam();
        return response()->json([
            "data" => [
                "id" => $cpu->getId(),
                "manufacturer_id" => $cpu->getManufacturerId(),
                "memory_speed_id" => $cpu->getMemorySpeedId(),
                "memory_type_id" => $cpu->getMemoryTypeId(),
                "name" => $cpu->getName(),
                "capacity" => $cpu->getCapacity(),
            ]
        ], 200);
    }

    public function update(UpdateMemoryDeviceRequest $request)
    {
        try {
            $ram = $request->getRam();
            $ram->setManufacturer($request->getManufacturer())
                ->setMemorySpeed($request->getMemorySpeed())
                ->setMemoryType($request->getMemoryType())
                ->setName($request->get('name'))
                ->setCapacity($request->get('capacity'))
                ->save();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'Memory Device updated successfully'
        ]);

        return response()->json([
            'redirect' => route('components.memory-devices'),
            'message' => 'Memory Device updated successfully'
        ], 200);
    }

    public function delete(MemoryDeviceRequest $request)
    {
        try {
            $request->getRam()->delete();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'Memory Device deleted successfully'
        ]);

        return response()->json([
            'redirect' => route('components.memory-devices'),
            'message' => 'Memory Device deleted successfully'
        ], 200);
    }
}
