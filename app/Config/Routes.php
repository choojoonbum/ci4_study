<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Board;
use CodeIgniter\Controller;

$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('board', 'Board::index');
$routes->get('board/create', 'Board::create');
$routes->post('board/create', 'Board::store');

$routes->get('member/login', 'Members::login');
$routes->get('member/logout', 'Members::logout');
$routes->post('member/login', 'Members::auth');

$routes->group('admin',['filter' => 'AdminAuth'], static function ($routes) {
    $routes->get('', 'Admin\Board::index');
    $routes->group('board', static function ($routes) {
        $routes->get('', 'Admin\Board::index');
        $routes->get('create', 'Admin\Board::create');
        $routes->get('update/(:num)', 'Admin\Board::update/$1');
        $routes->get('view/(:num)', 'Admin\Board::view/$1');
        $routes->get('delete/(:num)', 'Admin\Board::delete/$1');
        $routes->post('store', 'Admin\Board::store');
    });
    $routes->group('member', static function ($routes) {
        $routes->get('', 'Admin\Members::index');
        $routes->get('create', 'Admin\Members::create');
        $routes->post('create', 'Admin\Members::store');
    });
});

$routes->get('imageRender/(:any)', 'RenderImage::index/$1/$2');
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
