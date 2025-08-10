<?php

declare(strict_types=1);

namespace App\Controllers;

use Omega\Http\Response;

class IndexController extends Controller
{
    public function index(): Response
    {
        return view('index', [
            'title' => 'Omega Demo Application',
            'say'   => 'Welcome to Omega!',
        ]);
    }
}
