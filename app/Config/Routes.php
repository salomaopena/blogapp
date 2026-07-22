<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

service('auth')->routes($routes);

$routes->get('/', 'Home::index');
$routes->get('post/(:segment)', 'Home::post/$1');

$routes->group('admin', ['filter' => 'session'], static function ($routes) {
    $routes->get('/', 'Dashboard::index');

    // rotas de postas
    $routes->get('posts', 'Posts::index');
    $routes->get('posts/novo', 'Posts::novo', ['filter' => 'permission:posts.create']);
    $routes->post('posts/criar', 'Posts::criar', ['filter' => 'permission:posts.create']);
    $routes->get('posts/editar/(:segment)', 'Posts::editar/$1', ['filter' => 'permission:posts.edit']);
    $routes->post('posts/atualizar/(:segment)', 'Posts::atualizar/$1', ['filter' => 'permission:posts.edit']);
    $routes->post('posts/apagar/(:segment)', 'Posts::apagar/$1', ['filter' => 'permission:posts.delete']);

});

