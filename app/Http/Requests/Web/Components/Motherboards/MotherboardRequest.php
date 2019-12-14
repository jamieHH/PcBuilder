<?php namespace App\Http\Requests\Web\Components\Motherboards;

use App\Http\Requests\Web\Components\Request;
use App\Models\CpuSocketQuery;
use App\Models\MainboardChipsetQuery;
use App\Models\ManufacturerQuery;
use App\Models\MotherboardFormFactorQuery;
use App\Models\MotherboardQuery;

class MotherboardRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function getMotherboard()
    {
        return MotherboardQuery::create()->findOneById($this->route('id'));
    }

    public function getManufacturer()
    {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }

    public function getCpuSocket()
    {
        return CpuSocketQuery::create()->findOneById($this->get('cpu_socket_id'));
    }

    public function getMainboardChipset()
    {
        return MainboardChipsetQuery::create()->findOneById($this->get('mainboard_chipset_id'));
    }

    public function getMotherboardFormFactor()
    {
        return MotherboardFormFactorQuery::create()->findOneById($this->get('motherboard_form_factor_id'));
    }
}
