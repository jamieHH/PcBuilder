<?php namespace App\Http\Controllers\Web\Components\Processors;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\Processors\NewProcessorRequest;
use App\Http\Requests\Web\Components\Processors\ProcessorRequest;
use View;

class ProcessorsController extends Controller
{
    public function index()
    {
        return View::make('components.processors.index');
    }

    public function new()
    {
        return View::make('components.processors.new');
    }

    public function create(NewProcessorRequest $request)
    {
        return response()->json(['message', 'New Processor added successfully']);
    }

    public function json(ProcessorRequest $request)
    {
        return response()->json(['data' => ['processor' => 'details']]);
    }
}
