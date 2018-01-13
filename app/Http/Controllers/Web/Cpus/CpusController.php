<?php namespace App\Http\Controllers\Web\Cpus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Models\CpuQuery;

class CpusController extends Controller
{
    public function index(Request $request)
    {
        return view('cpus.index', [
            'cpus' => CpuQuery::create()->find()
        ]);
    }
}
