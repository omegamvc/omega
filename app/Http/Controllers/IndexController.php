<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Omega\Http\Response;

class IndexController extends AbstractController
{
    /**
     * @return Response
     */
    public function handle(): Response
    {
        return view('index', [
            'title' => 'Omega Demo Application',
            'say'   => 'Welcome to Omega!',
        ]);
    }
}
