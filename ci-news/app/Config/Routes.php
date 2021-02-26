<?php namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\BoardController;

$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/*
 * 게시판
 */
$routes->get('/boards/1', 'BoardController::index');
$routes->get('/boards/1/post', 'BoardController::post');
$routes->get('/boards/1/post/(:segment)','BoardController::setDataContent/post/$1');

/*
 * 글 작성
 * */
$routes->get('/boards/post', 'BoardController::post');
$routes->post('/boards/write/getDataContent', 'BoardController::getDataContent');

/*
 * 글 목록 수정
 * */
$routes->get ('/boards/edit', 'BoardController::edit');

// test routes
$routes->get('/news', 'NewsController::index');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
