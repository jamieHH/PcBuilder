<?php namespace App\Http\Controllers\Web\Components\StorageDevices;

use App\Http\Controllers\Web\Controller;
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
}
