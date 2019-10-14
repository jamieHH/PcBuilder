<?php namespace App\Http\Controllers\Web\Components\Processors;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\Processors\NewProcessorRequest;
use App\Http\Requests\Web\Components\Processors\ProcessorRequest;
use App\Models\Cpu;
use Propel\Runtime\Exception\PropelException;
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

    public function datatable(ProcessorRequest $request)
    {
        return response(['data' => ['processors' => ['processor1' => 'details', 'processor2' => 'details']]], 200);
    }

    public function create(NewProcessorRequest $request)
    {
        try {
            $cpu = new Cpu();
            $cpu->setManufacturer($request->getManufacturer())
                ->setCpuSocket($request->getCpuSocket())
                ->setName($request->get('name'))
                ->setCoreCount($request->get('core_count'))
                ->setThreadCount($request->get('thread_count'))
                ->setBaseClock($request->get('base_clock'))
                ->setBoostClock($request->get('boost_clock'))
                ->setL3Cache($request->get('l3_cache'))
                ->setTdp($request->get('tdp'))
                ->save();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        return response(['message', 'New Processor added successfully'], 200);
    }
}
