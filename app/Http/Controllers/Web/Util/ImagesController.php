<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function background()
    {
        return response(file_get_contents(public_path('images/backgrounds/blue-circuit-blurred.jpeg')), 200, [
            'Content-Type' => 'image/jpeg',
            'Content-Disposition' => 'inline filename="Background"'
        ]);
    }
}
