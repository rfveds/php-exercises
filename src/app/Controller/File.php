<?php

declare(strict_types=1);

namespace App\Controller;

use App\View;

class File
{
    public function index(): View
    {
        return View::make('file/index');
    }

    public function upload(): void
    {
        $filePath = STORAGE_PATH . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        header('Location: /');
        exit();

    }

    public function download(): void
    {
        $filePath = STORAGE_PATH . $_GET['file'];
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
        readfile($filePath);
    }
}