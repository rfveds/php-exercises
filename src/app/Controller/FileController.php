<?php

declare(strict_types=1);

namespace App\Controller;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Route;
use App\Enums\HttpMethod;
use App\View;

class FileController
{
    #[Get('/')]
    #[Route('/file', HttpMethod::Head)]
    public function index(): View
    {
        return View::make('file/index');
    }


   #[Post('/file/upload')]
    public function upload(): void
    {
        $filePath = STORAGE_PATH . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        header('Location: /');
        exit();

    }

    #[Get('/file/download')]
    public function download(): void
    {
        $filePath = STORAGE_PATH . $_GET['file'];
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        readfile($filePath);
    }
}