<?php namespace App\Http\Controllers\Web\Misc\Manufacturers;

use App\Http\Controllers\Web\Controller;
use App\Models\ManufacturerQuery;
use View;

class ManufacturersController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = ManufacturerQuery::create()->find();
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
