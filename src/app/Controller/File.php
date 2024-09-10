<?php

declare(strict_types=1);

namespace App\Controller;

class File
{
    public function index(): string
    {
        return <<<FORM
        <form action="/file/upload" method="post" enctype="multipart/form-data">
            <input type="file" name="file" />
            <button type="submit">Upload</button>
        </form>
FORM;

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