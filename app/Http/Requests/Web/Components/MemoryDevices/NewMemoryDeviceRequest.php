<?php namespace App\Http\Requests\Web\Components\MemoryDevices;

class NewMemoryDeviceRequest extends MemoryDeviceRequest
{
    public function rules()
    {
        return [
            'manufacturer_id' => 'required|numeric',
            'memory_speed_id' => 'required|numeric',
            'memory_type_id' => 'required|numeric',
            'name' => 'required',
            'capacity' => 'required|numeric',
        ];
    }
}
