<?php namespace App\Http\Requests\Web\Components\MemoryDevices;

use App\Http\Requests\Web\Components\Request;
use App\Models\ManufacturerQuery;
use App\Models\MemorySpeedQuery;
use App\Models\MemoryTypeQuery;
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

    public function getRam()
    {
        return RamQuery::create()->findOneById($this->route('id'));
    }

    public function getManufacturer()
    {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }

    public function getMemorySpeed()
    {
        return MemorySpeedQuery::create()->findOneById($this->get('memory_speed_id'));
    }

    public function getMemoryType()
    {
        return MemoryTypeQuery::create()->findOneById($this->get('memory_type_id'));
    }
}
