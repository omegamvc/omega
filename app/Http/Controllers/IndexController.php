<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Omega\Container\Definition\Exceptions\InvalidDefinitionException;
use Omega\Container\Exceptions\DependencyException;
use Omega\Container\Exceptions\NotFoundException;
use Omega\Http\Response;

class IndexController extends AbstractController
{
    /**
     * @throws InvalidDefinitionException
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function handle(): Response
    {
        return view('index', [
            'title' => 'Omega Demo Application',
            'say'   => 'Welcome to Omega!',
        ]);
    }
}
