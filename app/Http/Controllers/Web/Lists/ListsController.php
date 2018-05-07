<?php namespace App\Http\Controllers\Web\Lists;

use App\Http\Controllers\Web\Controller;
use View;

class ListsController extends Controller
{
    public function index()
    {
        return View::make('lists.index');
    }
}
