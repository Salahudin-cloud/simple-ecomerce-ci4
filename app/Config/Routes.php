<?php

namespace Config;

// Create a new instance of our RouteCollection class.
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

//process 
$routes->post('auth/login', 'Auth::login');
$routes->put('menu/user_manager/update_page/update/(:num)', 'Admin::update_user_process/$1');
$routes->post('buy/item', 'User::buy_process');

// 
$routes->get('menu/user_manager', 'Admin::getAllUsers');
$routes->get('menu/product_manager', 'Admin::getAllProducts');
$routes->get('menu/delivery_manager', 'Admin::delivery_manager');
$routes->get('menu/user_manager/update_page/(:any)', 'Admin::update_user/$1');

$routes->get('menu/product_manager/update/product/(:any)', 'Admin::update_product/$1');

$routes->put('menu/product_manager/update/product/process/(:any)', 'Admin::update_product_process/$1');

$routes->get('menu/product_manager/update/supply/product/(:any)', 'Admin::resupplyPage/$1');
$routes->put('menu/product_manager/update/supply/product/process/(:any)', 'Admin::resupplyPageProcess/$1');

$routes->get('buy/menu', 'User::buy_menu');
$routes->post('menu/delivery_manager/status/update', 'Admin::update_status_delivery');
$routes->delete('menu/user_manager/delete/(:any)', 'Admin::delete_user/$1');
$routes->delete('menu/product_manager/delete/(:any)', 'Admin::deleteProduct/$1');
$routes->get('menu/resupply_history', 'Admin::resupplyHistoryPage');

//
$routes->get('user', 'User::index');
$routes->get('/menu/edit_profile', 'User::editPage');
$routes->get('menu/buy', 'User::AllProducts');
$routes->get('/menu/transaction_history', 'User::transactionPage');
$routes->get('profile', 'User::profilePage');
// $routes->get('', '');

$routes->get('get-price/(:any)', 'User::getPrice/$1');
$routes->get('/logout', 'Auth::logout');
$routes->post('/register/process', 'Auth::registerProcess');
$routes->put('/menu/edit_profile/update/process', 'User::updateProfileProcess');


//show page only 
$routes->get('/', 'Home::home');
$routes->get('admin', 'Admin::admin_dashboard');


$routes->view('login', 'auth/login');
$routes->view('register', 'auth/register');



//testing page 
// $routes->get('/testing', 'Home::testing');


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
