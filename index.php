<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Psr7\Factory\ResponseFactory;
use Slim\Views\PhpRenderer;
use Src\Controllers\ApartmentController;
use Src\Controllers\ApiController;
use Src\Controllers\Auth\LoginController;
use Src\Controllers\Auth\RegisterController;
use Src\Controllers\BuildController;
use Src\Controllers\ImageController;
use Src\Controllers\LayoutController;
use Src\Controllers\ResidentController;
use Src\Middleware\AdminMiddleware;
use Src\Middleware\AuthMiddleware;

require __DIR__ . '/vendor/autoload.php';

session_start();

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

$container->set(PhpRenderer::class, function () {
    return new PhpRenderer(__DIR__ . '/templates');
});

ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username', 'docker');
ORM::configure('password', 'docker');

$app->get('/login', [LoginController::class, 'loginPage']);
$app->post('/login',[LoginController::class, 'login']);
$app->get('/register', [RegisterController::class, 'registerPage']);
$app->post('/register',[RegisterController::class, 'register']);

$app->group('/', function () use ($app) {
    $app->get('/residents', [ResidentController::class, 'index']);
    $app->get('/builds', [BuildController::class, 'index']);
    $app->get('/apartments', [ApartmentController::class, 'index']);
    $app->get('/layouts', [LayoutController::class, 'index']);
    $app->get('/images', [ImageController::class, 'index']);

    // Выход
    $app->get('/logout', [LoginController::class, 'logout']);
})->add(new AuthMiddleware($container->get(ResponseFactory::class)));

$app->group('/', function () use ($app) {
    // CRUD residents
    $app->get('/residents/create', [ResidentController::class, 'create']);
    $app->post('/residents/create', [ResidentController::class, 'store']);
    $app->get('/residents/{id}/edit', [ResidentController::class, 'edit']);
    $app->post('/residents/{id}/edit', [ResidentController::class, 'update']);
    $app->get('/residents/{id}', [ResidentController::class, 'destroy']);

    // CRUD builds
    $app->get('/builds/create', [BuildController::class, 'create']);
    $app->post('/builds/create', [BuildController::class, 'store']);
    $app->get('/builds/{id}/edit', [BuildController::class, 'edit']);
    $app->post('/builds/{id}/edit', [BuildController::class, 'update']);
    $app->get('/builds/{id}', [BuildController::class, 'destroy']);

    // CRUD apartments
    $app->get('/apartments/create', [ApartmentController::class, 'create']);
    $app->post('/apartments/create', [ApartmentController::class, 'store']);
    $app->get('/apartments/{id}/edit', [ApartmentController::class, 'edit']);
    $app->post('/apartments/{id}/edit', [ApartmentController::class, 'update']);
    $app->get('/apartments/{id}', [ApartmentController::class, 'destroy']);

    // CRUD layouts
    $app->get('/layouts/create', [LayoutController::class, 'create']);
    $app->post('/layouts/create', [LayoutController::class, 'store']);
    $app->get('/layouts/{id}/edit', [LayoutController::class, 'edit']);
    $app->post('/layouts/{id}/edit', [LayoutController::class, 'update']);
    $app->get('/layouts/{id}', [LayoutController::class, 'destroy']);

    // CRUD images
    $app->get('/images/create', [ImageController::class, 'create']);
    $app->post('/images/create', [ImageController::class, 'store']);
    $app->get('/images/{id}/edit', [ImageController::class, 'edit']);
    $app->post('/images/{id}/edit', [ImageController::class, 'update']);
    $app->get('/images/{id}', [ImageController::class, 'destroy']);
})->add(new AdminMiddleware($container->get(ResponseFactory::class)));

$app->get('/api/apartments', [ApiController::class, 'getApartments']);
$app->get('/api/buildings/{slug}', [ApiController::class, 'getBuildings']);

$app->run();