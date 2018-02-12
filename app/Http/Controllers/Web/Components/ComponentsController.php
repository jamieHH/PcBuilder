<?php namespace App\Http\Controllers\Web\Components;

use App\Http\Controllers\Web\Controller;
use View;

class ComponentsController extends Controller
{
    public function index()
    {
        return View::make('components.index');
    }
}
