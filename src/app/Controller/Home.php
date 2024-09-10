<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;

class Home
{
    public function index(): View
    {
        return View::make('home/index', [
            'foo' => 'bar',
        ]);
    }

}