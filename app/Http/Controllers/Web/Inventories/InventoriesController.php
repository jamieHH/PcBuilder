<?php namespace App\Http\Controllers\Web\Inventories;

use App\Http\Controllers\Web\Controller;
use View;

class InventoriesController extends Controller
{
    public function index()
    {
        return View::make('inventories.index');
    }
}
