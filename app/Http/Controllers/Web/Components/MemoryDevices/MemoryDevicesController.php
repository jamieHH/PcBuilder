<?php namespace App\Http\Controllers\Web\Components\MemoryDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\MemoryDevices\MemoryDeviceRequest;
use App\Http\Requests\Web\Components\MemoryDevices\NewMemoryDeviceRequest;
use App\Http\Requests\Web\Components\MemoryDevices\UpdateMemoryDeviceRequest;
use App\Models\Ram;
use App\Models\RamQuery;
use Propel\Runtime\Exception\PropelException;
use View;

class MemoryDevicesController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Memory Devices' => '#',
        ];

        return View::make('components.memory-devices.index')
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

    public function datatable(MemoryDeviceRequest $request)
    {
        $memoryDevices = RamQuery::create()->find();
        $headers = [
            'name' => 'Name',
            'capacity' => 'Capacity',
            'manufacturer' => ['Manufacturer', 'Name'],
            'memorySpeed' => ['MemorySpeed', 'Name'],
            'memoryType' => ['MemoryType', 'Name'],
            'edit' => 'Edit'
        ];
        $rows = [];

        foreach ($memoryDevices as $ram) {
            $row = [];
            foreach ($headers as $headerName => $methodGetter) {
                if ($headerName != "edit") {
                    if (is_array($methodGetter)) {
                        $result = $ram;
                        foreach ($methodGetter as $prop) {
                            $funk = sprintf('get%s', $prop);
                            $result = $result->$funk();
                        }

                        $row[$headerName] = $result;
                    } else {
                        $fName = sprintf('get%s', $methodGetter);
                        $row[$headerName] = $ram->$fName();
                    }
                } else {
                    $html = sprintf('<a href="%s">Edit</a>', route('components.memory-devices.memory-device.edit', ['id' => $ram->getId()]));
                    $row[$headerName] = $html;
                }
            }

            array_push($rows, $row);
        }

        return response()->json([
            'data' => $rows
        ], 200);
    }

    public function create(NewMemoryDeviceRequest $request)
    {
        try {
            $ram = new Ram();
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
            'message' => 'New Memory Device added successfully'
        ]);

        return response()->json([
            'redirect' => route('components.memory-devices'),
            'message' => 'New Memory Device added successfully'
        ], 200);
    }

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
