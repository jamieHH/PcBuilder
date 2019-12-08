<?php namespace App\Http\Controllers\Web\Misc\CpuSockets;

use App\Http\Controllers\Web\Controller;
use App\Models\CpuSocketQuery;
use View;

class CpuSocketsController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = CpuSocketQuery::create()->find();
        foreach ($items as $item) {
            array_push($options, [
                'id' => $item->getId(),
                'text' => $item->getName()
            ]);
        }
        return response()->json([
            'data' => $options
        ]);
    }
}
