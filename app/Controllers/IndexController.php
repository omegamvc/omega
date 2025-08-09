<?php

namespace App\Controllers;

use Omega\Http\Response;

class IndexController extends Controller
{
    public function index(): Response
    {
        return view('index', [
            'title' => 'Php is great',
            'say'   => 'hello, php enthusiastic!',
        ]);
    }
}
