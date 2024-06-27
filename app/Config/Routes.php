<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/categories/(:segment)', 'Home::byCategory/$1');
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    // Route dashboard
    $routes->get('', 'DashboardController::index');

    // Route categories
    $routes->group('categories', static function ($routes) {
        $routes->get('', 'CategoryController::index');
        $routes->get('create', 'CategoryController::create');
        $routes->post('create', 'CategoryController::store');
        $routes->get('(:num)/edit', 'CategoryController::edit/$1');
        $routes->put('(:num)/edit', 'CategoryController::update');
        $routes->delete('delete/(:num)', 'CategoryController::destroy/$1');
    });

    // Route products
    $routes->group('products', static function ($routes) {
        $routes->get('', 'ProductController::index');
        $routes->get('create', 'ProductController::create');
        $routes->post('create', 'ProductController::store');
        $routes->get('(:num)', 'ProductController::show/$1');
        $routes->get('(:num)/edit', 'ProductController::edit/$1');
        $routes->put('(:num)/edit', 'ProductController::update');
        $routes->delete('delete/(:num)', 'ProductController::destroy/$1');
    });

    // Route payments
    $routes->group('payments', static function ($routes) {
        $routes->get('', 'PaymentController::index');
        $routes->get('create', 'PaymentController::create');
        $routes->post('create', 'PaymentController::store');
        $routes->get('(:num)', 'PaymentController::show/$1');
        $routes->get('(:num)/edit', 'PaymentController::edit/$1');
        $routes->put('(:num)/edit', 'PaymentController::update');
        $routes->delete('delete/(:num)', 'PaymentController::destroy/$1');
    });

    // Route report products
    $routes->group('report/products', static function ($routes) {
        $routes->get('', 'ProductReportController::index');
        $routes->post('pdf', 'ProductReportController::pdf');
        $routes->post('excel', 'ProductReportController::excel');
    });

    // Route report payments
    $routes->group('report/payments', static function ($routes) {
        $routes->get('', 'PaymentReportController::index');
        $routes->post('pdf', 'PaymentReportController::pdf');
        $routes->post('excel', 'PaymentReportController::excel');
    });
});
