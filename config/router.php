<?php

use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use \Nico44\Controllers\CategoryController;
use \Nico44\Controllers\TagController;
use \Nico44\Controllers\PostController;

$request = Request::createFromGlobals();

function request() {
    global $request;

    return $request;
}

$router = new Router(new Dispatcher(), (new Container()));

function router() {
    global $router;

    return $router;
}

$router->get('/greeting', function(){
   echo 'Hi';
});

$router->get('/category', [CategoryController::class, 'index']);
$router->get('/category/{id}/show', [CategoryController::class, 'show']);
$router->get('/category/create', [CategoryController::class, 'create']);
$router->post('/category/store', [CategoryController::class, 'store']);
$router->get('/category/{id}/edit', [CategoryController::class, 'edit']);
$router->post('/category/update', [CategoryController::class, 'update']);
$router->get('/category/{id}/destroy', [CategoryController::class, 'destroy']);

$router->get('/tag', [TagController::class, 'index']);
$router->get('/tag/{id}/show', [TagController::class, 'show']);
$router->get('/tag/create', [TagController::class, 'create']);
$router->post('/tag/store', [TagController::class, 'store']);
$router->get('/tag/{id}/edit', [TagController::class, 'edit']);
$router->post('/tag/update', [TagController::class, 'update']);
$router->get('/tag/{id}/destroy', [TagController::class, 'destroy']);

$router->get('/post', [PostController::class, 'index']);
$router->get('/post/{id}/show', [PostController::class, 'show']);
$router->get('/post/create', [PostController::class, 'create']);
$router->post('/post/store', [PostController::class, 'store']);
$router->get('/post/{id}/edit', [PostController::class, 'edit']);
$router->post('/post/update', [PostController::class, 'update']);
$router->get('/post/{id}/destroy', [PostController::class, 'destroy']);
