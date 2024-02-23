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
    $routes->get('clientes/edit/(:num)', 'Clientes::edit/$1');
    $routes->put('clientes/update/(:num)', 'Clientes::update/$1');
    $routes->delete('clientes/delete/(:num)', 'Clientes::delete/$1');
    

    $routes->get('tipostransaccion', 'Tipos Transaccion::index');
    $routes->post('tipostransaccion/create', 'Tipos Transaccion::create');
    $routes->get('tipostransaccion/edit/(:num)', 'Tipos Transaccion::edit/$1');
    $routes->put('tipostransaccion/update/(:num)', 'Tipos Transaccion::update/$1');
    $routes->delete('tipostransaccion/delete/(:num)', 'Tipos Transaccion:: delete/$1');
    
    $routes->get('cuenta', 'Cuenta::index');
    $routes->post('cuenta/create', 'Cuenta::create');
    $routes->get('cuenta/edit/(:num)', 'Cuenta::edit/$1');                             
    $routes->put('cuenta/update/(:num)', 'Cuenta:: update/$1');
    $routes->delete('cuenta/delete/(:num)', 'Cuenta::delete/$1');

});
