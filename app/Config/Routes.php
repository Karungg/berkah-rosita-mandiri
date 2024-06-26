<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    // Route dashboard
    $routes->get('', 'DashboardController::index');

    // Route products
    $routes->group('products', static function ($routes) {
        $routes->get('', 'ProductController::index');
        $routes->get('create', 'ProductController::create');
        $routes->post('create', 'ProductController::store');
        $routes->get('(:num)/edit', 'ProductController::edit/$1');
        $routes->put('(:num)/edit', 'ProductController::update');
        $routes->delete('delete/(:num)', 'ProductController::destroy/$1');
    });
});
