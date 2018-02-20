<?php namespace App\Http\Controllers\Web\Components\Processors;

use App\Http\Controllers\Web\Controller;
use View;

class ProcessorsController extends Controller
{
    public function index()
    {
        return View::make('components.processors.index');
    }

    public function new()
    {
        return View::make('components.processors.new');
    }

    public function json()
    {
        return response()->json(['data' => ['processor' => 'details']]);
    }
}
