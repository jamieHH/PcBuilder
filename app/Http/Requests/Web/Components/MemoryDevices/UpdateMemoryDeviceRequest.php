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
            'name' => 'required',
            'manufacturer_id' => 'required|numeric',
        ];
    }
}
