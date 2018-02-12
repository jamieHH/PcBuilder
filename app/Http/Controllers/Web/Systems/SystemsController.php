<?php namespace App\Http\Controllers\Web\Systems;

use App\Http\Controllers\Web\Controller;
use View;

class SystemsController extends Controller
{
    public function index()
    {
        return View::make('systems.index');
    }
}
