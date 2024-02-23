<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//http://localhost:8080/api/
$routes->group('api',['namespace' => 'App\Controllers\API'], function($routes){
    
    //http://localhost:8080/api/clientes -->GET
    $routes->get('clientes', 'Clientes::index');
    $routes->post('clientes/create', 'Clientes::create');
});
