<?php namespace App\Http\Requests\Web\Components\Processors;

class NewProcessorRequest extends ProcessorRequest
{
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
            'lithography' => 'numeric',
        ];
    }
}
