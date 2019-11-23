<?php namespace App\Http\Controllers\Web\Components\Processors;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\Processors\NewProcessorRequest;
use App\Http\Requests\Web\Components\Processors\ProcessorRequest;
use App\Models\Cpu;
use App\Models\CpuQuery;
use Propel\Runtime\Exception\PropelException;
use View;

class ProcessorsController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Processors' => '#',
        ];

        return View::make('components.processors.index')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function new()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Processors' => route('components.processors'),
            'New Processor' => '#'
        ];

        return View::make('components.processors.new')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function datatable(ProcessorRequest $request)
    {
        $cpus = CpuQuery::create()->find();
        $headers = [
            'name' => 'Name',
            'coreCount' => 'CoreCount',
            'baseClock' => 'BaseClock',
            'boostClock' => 'BoostClock',
            'tdp' => 'TDP',
            'edit' => 'Edit'
        ];
        $rows = [];

        foreach ($cpus as $cpu) {
            $row = [];
            foreach ($headers as $headerName => $methodGetter) {
                if ($headerName != "edit") {
                    $fName = sprintf('get%s', $methodGetter);
                    $row[$headerName] = $cpu->$fName();
                } else {
                    $html = sprintf('<a href="%s">Edit</a>', route('components.processors.processor.edit', ['id' => $cpu->getId()]));
                    $row[$headerName] = $html;
                }
            }

            array_push($rows, $row);
        }

        return response()->json([
            'data' => $rows
        ], 200);
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
                ->setLithography($request->get('lithography'))
                ->save();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'New Processor added successfully'
        ]);

        return response()->json([
            'redirect' => route('components.processors'),
            'message' => 'New Processor added successfully'
        ], 200);
    }
}
