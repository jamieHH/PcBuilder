<?php namespace App\Http\Controllers\Web;

use View;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        return View::make('dashboard');
    }
}
