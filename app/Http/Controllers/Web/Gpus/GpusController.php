<?php

namespace App\Http\Controllers\Gpus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\GpuQuery;

class GpusController extends Controller
{
    public function __construct()
    {
        
    }

    public function getIndex(Request $request)
    {
        return view('gpus.index', [
            'gpus' => GpuQuery::create()->find()
        ]);
    }
}
