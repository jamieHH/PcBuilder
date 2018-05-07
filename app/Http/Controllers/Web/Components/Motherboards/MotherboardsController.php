<?php namespace App\Http\Controllers\Web\Components\Motherboards;

use App\Http\Controllers\Web\Controller;
use View;

class MotherboardsController extends Controller
{
    public function index()
    {
        return View::make('components.motherboards.index');
    }
}
