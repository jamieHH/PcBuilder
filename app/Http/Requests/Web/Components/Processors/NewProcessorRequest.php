<?php namespace App\Http\Requests\Web\Components\Processors;

use App\Http\Requests\Web\Components\Request;
use App\Models\CpuSocketQuery;
use App\Models\ManufacturerQuery;

class NewProcessorRequest extends Request
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
            'cpu_socket_id' => 'required|numeric',
            'core_count' => 'required|numeric',
            'thread_count' => 'required|numeric',
            'base_clock' => 'required|numeric',
            'l3_cache' => 'required|numeric',
        ];
    }

    public function getManufacturer() {
        return ManufacturerQuery::create()->findOneById($this->get('manufacturer_id'));
    }

    public function getCpuSocket() {
        return CpuSocketQuery::create()->findOneById($this->get('manufacturer_id'));
    }
}
