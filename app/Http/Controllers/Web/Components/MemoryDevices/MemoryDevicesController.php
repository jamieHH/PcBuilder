<?php namespace App\Http\Controllers\Web\Components\MemoryDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\MemoryDevices\MemoryDeviceRequest;
use App\Http\Requests\Web\Components\MemoryDevices\NewMemoryDeviceRequest;
use App\Models\RamQuery;
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
            'memorySpeed' => 'MemorySpeedId',
            'edit' => 'Edit'
        ];
        $rows = [];

        foreach ($memoryDevices as $ram) {
            $row = [];
            foreach ($headers as $headerName => $methodGetter) {
                if ($headerName != "edit") {
                    $fName = sprintf('get%s', $methodGetter);
                    $row[$headerName] = $ram->$fName();
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
        return response()->json([
            'redirect' => route('components.memory-devices'),
            'message' => 'New Memory Device added successfully'
        ], 200);
    }
}
