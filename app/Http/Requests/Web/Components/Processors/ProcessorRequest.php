<?php namespace App\Http\Requests\Web\Components\Processors;

use App\Http\Requests\Web\Components\Request;
use App\Models\CpuQuery;
use App\Models\CpuSocketQuery;
use App\Models\ManufacturerQuery;

class ProcessorRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function getCpu()
    {
        return CpuQuery::create()->findOneById($this->route('id'));
    }

    public function getManufacturer()
    {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }

    public function getCpuSocket()
    {
        return CpuSocketQuery::create()->findOneById($this->get('cpu_socket_id'));
    }
}
