<?php

declare(strict_types=1);

use App\Container;
use App\Controller\FileController;
use App\Controller\HomeController;
use App\Controller\InvoiceController;
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
    ->get('/', [HomeController::class, 'index'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->post('/invoices', [InvoiceController::class, 'create'])
    ->get('/file', [FileController::class, 'index'])
    ->post('/file/upload', [FileController::class, 'upload'])
    ->get('/file/download', [FileController::class, 'download']);


(new App\App(
    $container,
    $router,
    [
        'path' => $_SERVER['REQUEST_URI'],
        'method' => strtolower($_SERVER['REQUEST_METHOD'])
    ],
    new App\Config($_ENV)
))->run();