<?php namespace App\Http\Requests\Web\Components\Processors;

use App\Http\Requests\Web\Components\Request;

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

    public function getProcessor()
    {
        // TODO: get requested processor from database
    }
}
