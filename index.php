<?php

require __DIR__ . '/vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$router = new \Buki\Router\Router([
    'paths' => [
        'controllers' => __DIR__ . '/controllers',
    ],
    'namespaces' => [
        'controllers' => 'Controllers',
    ],
]);

// For basic GET URI
$router->get('/', function(Request $request, Response $response) {
    $response->setContent('Hello World');
    return $response;
});

$router->get('/login',function (){
    include './views/auth/index.php';
});
$router->get('/radiouno','RadiounoController@index');

// For basic GET URI by using a Controller class.
//$router->get('/test', 'IndexController@index');
$router->get('/foo', 'FooController@index');
// For auto discovering all methods and URIs
//$router->controller('/users', 'UserController');

$router->run();