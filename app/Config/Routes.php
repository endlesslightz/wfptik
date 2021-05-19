<?php

namespace Config;

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'admin\dashboard::index');
$routes->get('/admin/user', 'admin\user::index');
$routes->get('/admin/user/create', 'admin\user::create');
$routes->get('/admin/user/getdata', 'admin\user::getdata');
$routes->get('/admin/user/getform', 'admin\user::getform');
$routes->get('/admin/user/getform/(:segment)', 'admin\user::geteditform/$1');
$routes->put('/admin/user/update/(:segment)', 'admin\user::update/$1');
$routes->delete('/admin/user/hapus/(:segment)', 'admin\user::hapus/$1');
$routes->post('/admin/user/insert', 'admin\user::insert');
$routes->post('/admin/user/insertv2', 'admin\user::insertv2');
$routes->get('/admin/user/(:segment)', 'admin\user::detail/$1');
// $routes->get('/admin/user2/(:any)', 'admin\user::detail2/$1');

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
