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

// rutas para editorial
$routes->resource('editorial', ['placeholder' => '(:num)', 'except' => 'show']);

// rutas para idiomas
$routes->resource('idiomas', ['placeholder' => '(:num)', 'except' => 'show']);

// rutas para libros
$routes->resource('libros', ['placeholder' => '(:num)', 'except' => 'show']);

// rutas para ejemplares
$routes->resource('ejemplares', ['placeholder' => '(:num)', 'except' => 'show']);

// rutas para usuarios
$routes->resource('usuarios', ['placeholder' => '(:num)', 'except' => 'show']);

