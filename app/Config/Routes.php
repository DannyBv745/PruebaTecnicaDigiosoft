<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// rutas para categorias
$routes->get('categorias', 'Categorias::index');
