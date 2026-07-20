<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

service('auth')->routes($routes);

$routes->get('/', 'Home::index');

$routes->group('admin', ['filter' => 'session'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');

    // rotas de postas
    $routes->get('posts', 'Posts::index');
    $routes->get('posts/novo', 'Posts::novo');
    $routes->post('posts/criar', 'Posts::criar');
    $routes->get('posts/editar/(:segment)', 'Posts::editar/$1');
    $routes->post('posts/atualizar/(:segment)', 'Posts::atualizar/$1');
    $routes->post('posts/apagar/(:segment)', 'Posts::apagar/$1');

});

