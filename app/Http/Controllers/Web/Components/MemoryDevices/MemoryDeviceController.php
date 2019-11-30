<?php namespace App\Http\Controllers\Web\Components\MemoryDevices;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\MemoryDevices\MemoryDeviceRequest;
use App\Http\Requests\Web\Components\MemoryDevices\UpdateMemoryDeviceRequest;
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

    }

    public function update(UpdateMemoryDeviceRequest $request)
    {
        return response()->json([
            'redirect' => route('components.memory-devices'),
            'message' => 'Processor updated successfully'
        ], 200);
    }

    public function delete(MemoryDeviceRequest $request)
    {
        return response()->json([
            'redirect' => route('components.memory-devices'),
            'message' => 'Memory Device deleted successfully'
        ], 200);
    }
}
