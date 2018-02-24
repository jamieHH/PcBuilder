<?php namespace App\Http\Requests\Web\Components\Processors;

class UpdateProcessorRequest extends ProcessorRequest
{
    public function authorize()
    {
        return true; // TODO: if user has admin privileges
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }
}
