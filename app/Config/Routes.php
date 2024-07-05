<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// rutas para categorias
$routes->resource('categorias', ['placeholder' => '(:num)', 'except' => 'show']);

// rutas para autores
$routes->resource('autores', ['placeholder' => '(:num)', 'except' => 'show']);

