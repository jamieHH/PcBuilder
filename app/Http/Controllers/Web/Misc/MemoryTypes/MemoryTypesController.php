<?php namespace App\Http\Controllers\Web\Misc\MemoryTypes;

use App\Http\Controllers\Web\Controller;
use App\Models\MemoryTypeQuery;
use View;

class MemoryTypesController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = MemoryTypeQuery::create()->find();
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
