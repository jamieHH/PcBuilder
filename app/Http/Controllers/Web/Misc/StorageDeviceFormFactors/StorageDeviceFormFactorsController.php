<?php namespace App\Http\Controllers\Web\Misc\StorageDeviceFOrmFactors;

use App\Http\Controllers\Web\Controller;
use App\Models\Base\StorageDeviceFormFactorQuery;
use View;

class StorageDeviceFormFactorsController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = StorageDeviceFormFactorQuery::create()->find();
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
