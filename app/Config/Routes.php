<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

service('auth')->routes($routes);

$routes->get('/', 'Home::index');

$routes->group('admin', ['filter' => 'session'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');
});

