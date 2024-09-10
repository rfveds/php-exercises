<?php

declare(strict_types=1);

use App\Controller\File;
use App\Controller\Home;
use App\Controller\Invoice;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

const STORAGE_PATH = __DIR__ . '/../storage/';
const VIEWS_PATH = __DIR__ . '/../views/';

$router = new Router();

$router
    ->get('/', [Home::class, 'index'])
    ->get('/invoices', [Invoice::class, 'index'])
    ->post('/invoices', [Invoice::class, 'create'])
    ->get('/file', [File::class, 'index'])
    ->post('/file/upload', [File::class, 'upload'])
;

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
