<?php namespace App\Http\Controllers\Web\Components\Gpus;

use App\Http\Controllers\Web\Controller;
use View;

class GpusController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            'Components' => route('components'),
            'GPUs' => '#',
        ];

        return View::make('components.gpus.index')
            ->with('breadcrumbs', $breadcrumbs);
    }
}
