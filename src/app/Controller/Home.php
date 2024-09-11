<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\SignUp;
use App\Model\User;
use App\View;

class Home
{
    public function index(): View
    {
        $name = 'John Doe';
        $email = 'doe@mail.com';
        $password = '123';

        $userModel = new User();
        $userId = (new SignUp($userModel))->register(
            $email,
            $name,
            $password
        );

        return View::make('home/index', [
            'user' => $userModel->findById($userId),
        ]);
    }

}