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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'admin\dashboard::index', ['filter' => 'auth']);
$routes->get('/admin/user', 'admin\user::index', ['filter' => 'auth']);
$routes->get('/admin/user/create', 'admin\user::create', ['filter' => 'auth']);
$routes->get('/admin/user/getdata', 'admin\user::getdata', ['filter' => 'auth']);
$routes->get('/admin/user/getform', 'admin\user::getform', ['filter' => 'auth']);
$routes->get('/admin/user/getform/(:segment)', 'admin\user::geteditform/$1', ['filter' => 'auth']);
$routes->put('/admin/user/update/(:segment)', 'admin\user::update/$1', ['filter' => 'auth']);
$routes->delete('/admin/user/hapus/(:segment)', 'admin\user::hapus/$1', ['filter' => 'auth']);
$routes->post('/admin/user/insert', 'admin\user::insert', ['filter' => 'auth']);
$routes->post('/admin/user/insertv2', 'admin\user::insertv2', ['filter' => 'auth']);
$routes->get('/admin/user/(:segment)', 'admin\user::detail/$1', ['filter' => 'auth']);
$routes->get('/admin/dashboard', 'admin\dashboard::index', ['filter' => 'auth']);
$routes->get('/admin/about', 'admin\about::index', ['filter' => 'auth']);

$routes->get('/masuk', 'otentikasi::index', ['filter' => 'noauth']);
$routes->post('/cek', 'otentikasi::login', ['filter' => 'noauth']);
$routes->get('/keluar', 'otentikasi::logout');
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
