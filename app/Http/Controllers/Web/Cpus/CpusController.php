<?php namespace App\Http\Controllers\Web\Cpus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\GpuQuery;

class CpusController extends Controller
{
    public function index(Request $request)
    {
        return view('cpus.index', [
            'cpus' => GpuQuery::create()->find()
        ]);
    }
}
