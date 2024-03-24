<?php

use Authentication\Controllers\AuthenticationController;
use Authentication\Controllers\RoleController;


$routes->group('', static function ($routes) {

    // Authentication sub-routes
    $routes->group('authentication', static function ($routes) {
        // Role
        $routes->group('role', function ($routes) {
            $routes->get('', [RoleController::class, 'index']);
            $routes->post('create', 'Auth\Role::create');
            $routes->patch('update/(:any)', 'Auth\Role::update/$1');
            $routes->delete('delete/(:any)', 'Auth\Role::delete/$1');
        });
    });
});
