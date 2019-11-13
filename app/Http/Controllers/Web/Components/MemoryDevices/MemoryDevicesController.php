<?php namespace App\Http\Controllers\Web\Components\MemoryDevices;

use App\Http\Controllers\Web\Controller;
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
}
