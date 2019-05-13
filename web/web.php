<?php

use Illuminate\Routing\Router;
use Miapenso\News\Controllers\NewsController;
Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {
    $router->resource('news/index',NewsController::class);
});


