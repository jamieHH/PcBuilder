<?php namespace App\Http\Controllers\Web\Misc\InterfaceTypes;

use App\Http\Controllers\Web\Controller;
use App\Models\InterfaceTypeQuery;
use View;

class InterfaceTypesController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = InterfaceTypeQuery::create()->find();
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
