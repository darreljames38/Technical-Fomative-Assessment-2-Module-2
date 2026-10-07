<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Authentication
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempt');
$routes->post('logout', 'Auth::logout');

// Main system selector
$routes->get('/', 'Portal::index');

// Public POS pages
$routes->get('pos', 'Pages::landing');
$routes->get('pos/about', 'Pages::about');

// Protected POS account-management routes
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    // Customers
    $routes->get('customers', 'Customers::index');
    $routes->get('customers/new', 'Customers::new');
    $routes->post('customers/create', 'Customers::create');
    $routes->get('customers/edit/(:num)', 'Customers::edit/$1');
    $routes->post('customers/update/(:num)', 'Customers::update/$1');

    // Users
    $routes->get('users', 'Users::index');
    $routes->get('users/new', 'Users::new');
    $routes->post('users/create', 'Users::create');
    $routes->get('users/edit/(:num)', 'Users::edit/$1');
    $routes->post('users/update/(:num)', 'Users::update/$1');
});
// Public Tasks authentication
$routes->get('tasks/login', 'TaskAuth::login');
$routes->post('tasks/login', 'TaskAuth::attempt');
$routes->post('tasks/logout', 'TaskAuth::logout');

// Public Tasks pages
$routes->get('today', 'Welcome::index');
$routes->get('tasks', 'Tasks::index');
$routes->get('profile', 'Profile::index');
$routes->get('about', 'Pages2::about');

// Protected task-management actions
$routes->group(
    'tasks',
    ['filter' => 'task-auth'],
    static function ($routes) {
        $routes->get('new', 'Tasks::new');
        $routes->post('create', 'Tasks::create');
        $routes->get('edit/(:num)', 'Tasks::edit/$1');
        $routes->post('update/(:num)', 'Tasks::update/$1');
        $routes->post('archive/(:num)', 'Tasks::archive/$1');
    }
);

$routes->setAutoRoute(false);