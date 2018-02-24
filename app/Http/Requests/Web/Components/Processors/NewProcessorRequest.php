<?php namespace App\Http\Requests\Web\Components\Processors;

use App\Http\Requests\Web\Components\Request;

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
        ];
    }
}
