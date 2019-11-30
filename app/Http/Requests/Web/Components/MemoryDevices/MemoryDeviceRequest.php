<?php namespace App\Http\Requests\Web\Components\MemoryDevices;

use App\Http\Requests\Web\Components\Request;
use App\Models\ManufacturerQuery;
use App\Models\RamQuery;

class MemoryDeviceRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function getManufacturer()
    {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }

    public function getRam()
    {
        return RamQuery::create()->findOneById($this->route('id'));
    }
}
