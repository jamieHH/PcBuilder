<?php namespace App\Http\Controllers\Web\Misc\MainboardChipsets;

use App\Http\Controllers\Web\Controller;
use App\Models\MainboardChipsetQuery;
use View;

class MainboardChipsetsController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = MainboardChipsetQuery::create()->find();
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
