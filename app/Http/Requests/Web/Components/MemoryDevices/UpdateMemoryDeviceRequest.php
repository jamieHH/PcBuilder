<?php namespace App\Http\Requests\Web\Components\MemoryDevices;

class UpdateMemoryDeviceRequest extends MemoryDeviceRequest
{
    public function authorize()
    {
        return true; // TODO: if user has admin privileges
    }

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
