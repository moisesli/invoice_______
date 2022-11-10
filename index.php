<?php

require __DIR__ . '/vendor/autoload.php';

use Buki\Router\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


$router = new \Buki\Router\Router([
  'paths' => [
    'controllers' => __DIR__ . '/controllers',
    'middlewares' => __DIR__ . '/middlewares'
  ],
  'namespaces' => [
    'controllers' => 'Controllers',
    'middlewares' => 'Middlewares'
  ],
]);

// For basic GET URI
$router->get('/', 'AuthController@index');

//$router->get('/', function(Request $request, Response $response) {
//    $response->setContent('Hola moises linaress');
//    return $response;
//});

// Login
$router->post('/api/login', 'AuthController@login');
$router->get('/login', function () {
  include './views/auth/login.php';
});


// Registro
$router->post('/api/registro', 'AuthController@index');
$router->get('/registro', function () {
  include './views/auth/registro.php';
});

// Documentos
$router->get('/documentos', 'DocumentosController@index', ['before' => 'CheckAuth']);


// Productos
$router->get('/productos', 'ProductosController@index', ['before' => 'CheckAuth']);
$router->post('/api/productos/list', 'ProductosController@list', ['before' => 'CheckAuth']);
$router->get(
  '/productos/new',
  'ProductosController@new',
  ['before' => 'CheckAuth']
);
$router->get(
  '/productos/edit/:id',
  'ProductosController@edit',
  ['before' => 'CheckAuth']
);
$router->post(
  '/api/productos/getid/:id',
  'ProductosController@getid',
  ['before' => 'CheckAuth']
);
$router->post(
  '/api/productos/store',
  'ProductosController@store',
  ['before' => 'CheckAuth']
);


// Unidades
$router->post(
  '/api/unidades/list',
  'UnidadesController@list',
  ['before' => 'CheckAuth']
);

$router->get('/radiouno', 'RadiounoController@index');

// For basic GET URI by using a Controller class.
//$router->get('/test', 'IndexController@index');
$router->get('/foo', 'FooController@index');
// For auto discovering all methods and URIs
//$router->controller('/users', 'UserController');


// Logut
$router->get('/logout', 'AuthController@logout');

$router->run();
