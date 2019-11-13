<?php namespace App\Http\Controllers\Web\Components\Processors;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\Processors\ProcessorRequest;
use App\Http\Requests\Web\Components\Processors\UpdateProcessorRequest;
use Propel\Runtime\Exception\PropelException;
use View;

class ProcessorController extends Controller
{
    public function edit(ProcessorRequest $request, $id)
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Processors' => route('components.processors'),
            'Edit Processor' => '#',
        ];

        return View::make('components.processors.edit', ['id' => $id])
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function details(ProcessorRequest $request)
    {
        $cpu = $request->getCpu();
        return response()->json([
            "processor" => [
                "id" => $cpu->getId(),
                "name" => $cpu->getName(),
                "manufacturer_id" => $cpu->getManufacturerId(),
                "cpu_socket_id" => $cpu->getCpuSocketId(),
                "base_clock" => $cpu->getBaseClock(),
                "boost_clock" => $cpu->getBoostClock(),
                "core_count" => $cpu->getCoreCount(),
                "thread_count" => $cpu->getThreadCount(),
                "l3_cache" => $cpu->getL3Cache(),
                "tdp" => $cpu->getTdp(),
                "lithography" => $cpu->getLithography(),
            ]
        ], 200);
    }

    public function update(UpdateProcessorRequest $request)
    {
        try {
            $cpu = $request->getCpu();
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
            'message' => 'Processor updated successfully'
        ]);

        return response()->json([
            'redirect' => route('components.processors'),
            'message' => 'Processor updated successfully'
        ], 200);
    }

    public function delete(ProcessorRequest $request)
    {
        try {
            $request->getCpu()->delete();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'Processor deleted successfully'
        ]);

        return response()->json([
            'redirect' => route('components.processors'),
            'message' => 'Processor deleted successfully'
        ], 200);
    }
}
