<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\Test;

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
 * READ - POST
 * CREATE - GET
 * UPDATE - PUT, PATCH
 * DELETE - DELETE
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

$routes->presenter("Boards");


// 메인 페이지
$routes->get('Boards', 'Boards::index');

// 게시판 작성 뷰
$routes->get('Boards/new', 'Boards::new');
$routes->get('Boards/create', 'Boards::create');

// 게시판 수정
$routes->get('Boards/edit/(.*)', 'Boards::edit/$1');
$routes->put('Boards/update/(.*)', 'Boards::update/$1');

// $routes->get('Boards/data', 'Boards::showparams');

// 게시판 한 개 보이기
$routes->get('Boards/(.*)', 'Boards::show/$1');

// 게시판 작성 폼 요청 시 교환 데이터 경로
$routes->post('Boards', 'Boards::create');

// 게시판 게시물 삭제
$routes->post('Boards/remove/(.*)', 'Boards::remove/$1');


$routes->get('sign', 'User::index');
$routes->get('test', 'Test::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
