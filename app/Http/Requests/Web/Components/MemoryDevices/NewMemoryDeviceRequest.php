<?php namespace App\Http\Requests\Web\Components\MemoryDevices;

use App\Http\Requests\Web\Components\Request;
use App\Models\ManufacturerQuery;

class NewMemoryDeviceRequest extends Request
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

    public function getManufacturer()
    {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }
}
