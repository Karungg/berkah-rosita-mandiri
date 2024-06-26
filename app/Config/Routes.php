<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('', 'DashboardController::index');
});
