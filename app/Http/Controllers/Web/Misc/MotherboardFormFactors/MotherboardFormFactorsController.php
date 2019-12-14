<?php namespace App\Http\Controllers\Web\Misc\MotherboardFormFactors;

use App\Http\Controllers\Web\Controller;
use App\Models\Base\MotherboardFormFactorQuery;
use View;

class MotherboardFormFactorsController extends Controller
{
    public function select2()
    {
        $options = [];
        $items = MotherboardFormFactorQuery::create()->find();
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
