<?php

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Middlewares\CorsMiddleware;

return function (App $app)
{
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });
    $app->add(CorsMiddleware::class);

    $app->group('/api', function(Group $apiGroup)
    {
        $apiGroup->group('/client', function(Group $clientGroup) 
        {
            $clientGroup->post('/login', "App\Controllers\AccountController:login");
            $clientGroup->post('/register', "App\Controllers\AccountController:register");
        });
        $apiGroup->group('/product', function(Group $productGroup)
        {
            $productGroup->post('/all', "App\Controllers\ProductController:retrieve_all");
            $productGroup->post('/id', "App\Controllers\ProductController:retrieve_by_id");
        });
    });
};
