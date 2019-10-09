<?php namespace App\Http\Controllers\Web\Components\Processors;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\Processors\NewProcessorRequest;
use App\Http\Requests\Web\Components\Processors\ProcessorRequest;
use View;

class ProcessorController extends Controller
{
    public function edit()
    {
        return View::make('components.processors.edit');
    }

    public function update(NewProcessorRequest $request)
    {
        return response()->json(['message', 'Processor updated successfully']);
    }

    public function json(ProcessorRequest $request)
    {
        return response()->json(['data' => ['processor' => 'details']]);
    }
}
