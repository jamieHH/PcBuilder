<?php namespace App\Http\Controllers\Web\Components\Motherboards;

use App\Http\Controllers\Web\Controller;
use App\Http\Requests\Web\Components\Motherboards\NewMotherboardRequest;
use App\Http\Requests\Web\Components\Motherboards\MotherboardRequest;
use App\Http\Requests\Web\Components\Motherboards\UpdateMotherboardRequest;
use App\Models\Motherboard;
use App\Models\MotherboardQuery;
use Propel\Runtime\Exception\PropelException;
use View;

class MotherboardsController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Motherboards' => '#',
        ];

        return View::make('components.motherboards.index')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function new()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Motherboards' => route('components.motherboards'),
            'New Motherboard' => '#'
        ];

        return View::make('components.motherboards.new')
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function datatable(MotherboardRequest $request)
    {
        $cpus = MotherboardQuery::create()->find();
        $headers = [
            'name' => 'Name',
            'manufacturer' => ['Manufacturer', 'Name'],
            'cpuSocket' => ['CpuSocket', 'Name'],
            'mainboardChipset' => ['MainboardChipset', 'Name'],
            'motherboardFormFactor' => ['MotherboardFormFactor', 'Name'],
            'edit' => 'Edit'
        ];
        $rows = [];

        foreach ($cpus as $cpu) {
            $row = [];
            foreach ($headers as $headerName => $methodGetter) {
                if ($headerName != "edit") {
                    if (is_array($methodGetter)) {
                        $result = $cpu;
                        foreach ($methodGetter as $prop) {
                            $funk = sprintf('get%s', $prop);
                            $result = $result->$funk();
                        }

                        $row[$headerName] = $result;
                    } else {
                        $fName = sprintf('get%s', $methodGetter);
                        $row[$headerName] = $cpu->$fName();
                    }
                } else {
                    $html = sprintf('<a href="%s">Edit</a>', route('components.motherboards.motherboard.edit', ['id' => $cpu->getId()]));
                    $row[$headerName] = $html;
                }
            }

            array_push($rows, $row);
        }

        return response()->json([
            'data' => $rows
        ], 200);
    }

    public function create(NewMotherboardRequest $request)
    {
        try {
            $motherboard = new Motherboard();
            $motherboard->setManufacturer($request->getManufacturer())
                ->setCpuSocket($request->getCpuSocket())
                ->setMainboardChipset($request->getMainboardChipset())
                ->setMotherboardFormFactor($request->getMotherboardFormFactor())
                ->setName($request->get('name'))
                ->save();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'New Motherboard added successfully'
        ]);

        return response()->json([
            'redirect' => route('components.motherboards'),
            'message' => 'New Motherboard added successfully'
        ], 200);
    }

    public function edit(MotherboardRequest $request, $id)
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'Motherboards' => route('components.motherboards'),
            'Edit Motherboard' => '#',
        ];

        return View::make('components.motherboards.edit', ['id' => $id])
            ->with('breadcrumbs', $breadcrumbs);
    }

    public function details(MotherboardRequest $request)
    {
        $motherboard = $request->getMotherboard();
        return response()->json([
            "data" => [
                "id" => $motherboard->getId(),
                "name" => $motherboard->getName(),
                "manufacturer_id" => $motherboard->getManufacturerId(),
                "cpu_socket_id" => $motherboard->getCpuSocketId(),
                "mainboard_chipset_id" => $motherboard->getMainboardChipsetId(),
                "motherboard_form_factor_id" => $motherboard->getMotherboardFormFactorId(),
            ]
        ], 200);
    }

    public function update(UpdateMotherboardRequest $request)
    {
        try {
            $motherboard = $request->getMotherboard();
            $motherboard->setManufacturer($request->getManufacturer())
                ->setCpuSocket($request->getCpuSocket())
                ->setMainboardChipset($request->getMainboardChipset())
                ->setMotherboardFormFactor($request->getMotherboardFormFactor())
                ->setName($request->get('name'))
                ->save();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'Motherboard updated successfully'
        ]);

        return response()->json([
            'redirect' => route('components.motherboards'),
            'message' => 'Motherboard updated successfully'
        ], 200);
    }

    public function delete(MotherboardRequest $request)
    {
        try {
            $request->getMotherboard()->delete();
        } catch (PropelException $e) {
            return response(['message' => $e->getMessage()], 500);
        }

        session()->flash('pageAlert', [
            'type' => 'success',
            'message' => 'Motherboard deleted successfully'
        ]);

        return response()->json([
            'redirect' => route('components.motherboards'),
            'message' => 'Motherboard deleted successfully'
        ], 200);
    }
}
