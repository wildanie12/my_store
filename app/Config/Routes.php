<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'User::index');
$routes->get('/user/edit/(:segment)', 'User::edit/$1');
$routes->get('/user/update/(:num)', 'User::update/$1');
$routes->delete('/user/(:num)', 'User::delete/$1');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

$routes->get('/product', 'Product::index');
$routes->get('/product/create', 'Product::create');
$routes->get('/product/edit/(:segment)', 'Product::edit/$1');
$routes->delete('/product/(:num)', 'Product::delete/$1');
$routes->get('/product/(:any)', 'Product::detail/$1');

$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/create', 'Penjualan::create/$1');
$routes->get('/penjualan/edit/(:segment)', 'Penjualan::edit/$1');
$routes->delete('/penjualan/(:num)', 'Penjualan::delete/$1');

$routes->get('/home', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
