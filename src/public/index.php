<?php

declare(strict_types=1);

use App\Container;
use App\Controller\File;
use App\Controller\Home;
use App\Controller\Invoice;
use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

const STORAGE_PATH = __DIR__ . '/../storage/';
const VIEWS_PATH = __DIR__ . '/../views/';

$container = new Container();
$router = new Router($container);


$router
    ->get('/', [Home::class, 'index'])
    ->get('/invoices', [Invoice::class, 'index'])
    ->post('/invoices', [Invoice::class, 'create'])
    ->get('/file', [File::class, 'index'])
    ->post('/file/upload', [File::class, 'upload'])
    ->get('/file/download', [File::class, 'download']);


(new App\App(
    $container,
    $router,
    [
        'path' => $_SERVER['REQUEST_URI'],
        'method' => strtolower($_SERVER['REQUEST_METHOD'])
    ],
    new App\Config($_ENV)
))->run();