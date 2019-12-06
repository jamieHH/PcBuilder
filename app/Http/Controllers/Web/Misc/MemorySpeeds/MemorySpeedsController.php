<?php namespace App\Http\Controllers\Web\Misc\MemorySpeeds;

use App\Http\Controllers\Web\Controller;
use App\Models\MemorySpeedQuery;
use View;

class MemorySpeedsController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = MemorySpeedQuery::create()->find();
        foreach ($items as $item) {
            array_push($options, [
                'id' => $item->getId(),
                'name' => $item->getName()
            ]);
        }
        return response()->json([
            'data' => $options
        ]);
    }
}
