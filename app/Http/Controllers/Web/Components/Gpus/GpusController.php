<?php namespace App\Http\Controllers\Web\Components\Gpus;

use App\Http\Controllers\Web\Controller;
use View;

class GpusController extends Controller
{
    public function index()
    {
        return View::make('components.gpus.index');
    }

    public function json()
    {
        return response()->json(['data' => ['gpu' => 'details']]);
    }
}
