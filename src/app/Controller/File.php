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

    public function upload(): string
    {
        $filePath = STORAGE_PATH . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        echo '<pre>';
        var_dump(pathinfo($filePath));
        echo '</pre>';

        return 'File uploaded';
    }
}