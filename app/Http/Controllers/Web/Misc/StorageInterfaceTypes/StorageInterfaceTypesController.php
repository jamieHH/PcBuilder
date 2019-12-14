<?php namespace App\Http\Controllers\Web\Misc\StorageInterfaceTypes;

use App\Http\Controllers\Web\Controller;
use App\Models\StorageInterfaceTypeQuery;
use View;

class StorageInterfaceTypesController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = StorageInterfaceTypeQuery::create()->find();
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
