<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Auth
$routes->get('/login', 'Auth::index');
$routes->post('/login', 'Auth::login');
$routes->post('/login-validation', 'Auth::loginValidation');
$routes->get('/logout', 'Auth::logout');
// Dashboard
$routes->get('/', 'Dashboard::index');
// Anak
$routes->get('/anak', 'Anak::index');
$routes->match(['get', 'post'], '/anak/create', 'Anak::create');
$routes->get('/anak/(:segment)/view', 'Anak::show/$1');
$routes->match(['get', 'put'], '/anak/(:segment)/edit', 'Anak::edit/$1');
$routes->delete('/anak', 'Anak::delete');
$routes->post('/anak-validation', 'Anak::validation');
// Ayah
$routes->get('/ayah', 'Ayah::index');
$routes->match(['get', 'post'], '/ayah/create', 'Ayah::create');
$routes->get('/ayah/(:segment)/view', 'Ayah::show/$1');
$routes->match(['get', 'put'], '/ayah/(:segment)/edit', 'Ayah::edit/$1');
$routes->delete('/ayah', 'Ayah::delete');
$routes->post('/ayah-validation', 'Ayah::validation');
// Ibu
$routes->get('/ibu-hamil', 'IbuHamil::index');
$routes->match(['get', 'post'], '/ibu-hamil/create', 'IbuHamil::create');
$routes->get('/ibu-hamil/(:segment)/view', 'IbuHamil::show/$1');
$routes->match(['get', 'put'], '/ibu-hamil/(:segment)/edit', 'IbuHamil::edit/$1');
$routes->delete('/ibu-hamil', 'IbuHamil::delete');
$routes->post('/ibu-hamil-validation', 'IbuHamil::validation');
// Imunisasi
$routes->get('/imunisasi', 'Imunisasi::index');
$routes->match(['get', 'post'], '/imunisasi/create', 'Imunisasi::create');
$routes->get('/imunisasi/(:segment)/view', 'Imunisasi::show/$1');
$routes->match(['get', 'put'], '/imunisasi/(:segment)/edit', 'Imunisasi::edit/$1');
$routes->delete('/imunisasi', 'Imunisasi::delete');
$routes->post('/imunisasi-validation', 'Imunisasi::validation');
// Jenis Imunisasi
$routes->get('/jenis-imunisasi', 'JenisImunisasi::index');
$routes->match(['get', 'post'], '/jenis-imunisasi/create', 'JenisImunisasi::create');
$routes->match(['get', 'put'], '/jenis-imunisasi/(:segment)/edit', 'JenisImunisasi::edit/$1');
$routes->delete('/jenis-imunisasi', 'JenisImunisasi::delete');
$routes->post('/jenis-imunisasi-validation', 'JenisImunisasi::validation');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
