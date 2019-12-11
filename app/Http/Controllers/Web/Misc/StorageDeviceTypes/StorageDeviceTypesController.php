<?php namespace App\Http\Controllers\Web\Misc\StorageDeviceTypes;

use App\Http\Controllers\Web\Controller;
use App\Models\StorageDeviceTypeQuery;
use View;

class StorageDeviceTypesController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = StorageDeviceTypeQuery::create()->find();
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
