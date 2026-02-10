<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Landing Page
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::index');
$routes->post('/login/auth', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Admin::index');          
    $routes->get('produk', 'Admin::produk');    
    $routes->post('produk/create', 'Admin::create');
    $routes->get('produk/edit/(:num)', 'Admin::edit/$1');
    $routes->post('produk/update/(:num)', 'Admin::update/$1');
    $routes->get('produk/delete/(:num)', 'Admin::delete/$1');
});

