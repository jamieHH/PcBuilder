<?php namespace App\Http\Controllers\Web\Gpus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\GpuQuery;

class GpusController extends Controller
{
    public function index(Request $request)
    {
        return view('gpus.index', [
            'gpus' => GpuQuery::create()->find()
        ]);
    }
}
