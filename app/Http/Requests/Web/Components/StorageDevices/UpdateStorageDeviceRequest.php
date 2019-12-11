<?php namespace App\Http\Requests\Web\Components\StorageDevices;

class UpdateStorageDeviceRequest extends StorageDeviceRequest
{
    public function authorize()
    {
        return true; // TODO: if user has admin privileges
    }

    public function rules()
    {
        return [
            'manufacturer_id' => 'required|numeric',
            'interface_type_id' => 'required',
            'storage_device_type_id' => 'required',
            'storage_device_form_factor_id' => 'required',
            'name' => 'required',
            'capacity' => 'required',
            'cache' => 'required',
        ];
    }
}
