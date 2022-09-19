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
$routes->get('/', 'AdminController::index');
$routes->post('login', 'AdminController::login');
$routes->get('showAllTag', 'AdminController::showAllTag');
$routes->get('showDrugList', 'AdminController::showDrugList');
$routes->get('showAllDeletedDrugData', 'AdminController::showAllDeletedDrugData');
$routes->get('CreateDrugAdmin', 'AdminController::CreateDrugAdmin');
$routes->get('modifyDrugDetail/(:any)', 'AdminController::modifyDrugDetail');
$routes->post('createDrug', 'AdminController::createDrug');
$routes->post('deleteDrug', 'AdminController::deleteDrugDetail');
$routes->post('modifyDrug', 'AdminController::modifyDrug');
$routes->post('reactiveDrugById', 'AdminController::reactiveDrugById');
$routes->get('logout', 'AdminController::logout');
$routes->get('getDashboard', 'AdminController::getDashboard');
$routes->get('forgotPassView', 'AdminController::forgotPassView');
$routes->post('forgotpassword', 'AdminController::forgotpassword');
$routes->get('changePassword', 'AdminController::changePassword');
$routes->get('changeEmail', 'AdminController::changeEmail');
$routes->post('ChangeEmailId', 'AdminController::ChangeEmailId');
$routes->get('documentation', 'AdminController::documentation');
$routes->get('apiDoc', 'AdminController::api_documentation');

$routes->get('callback', 'AdminController::callback');


//drug encyclopedia directories  callback 
$routes->get('drugEncyclopedia', 'DrugController::index');
$routes->post('showAllDrugByAlpha', 'DrugController::showAllDrugByAlpha');
$routes->get('drugdatabyname/(:any)', 'DrugController::getDrugDataByName');
$routes->post('searchfunction', 'DrugController::searchfunction');
$routes->get('getSearchResult', 'DrugController::getSearchResult');
// $routes->get('manufacturerDataById/(:any)', 'DrugController::getDataByManufacturereId');
$routes->get("getDrugByTag/(:any)", "DrugController::getDrugByTag");

//Services are starting 
// $routes->post('test', 'ServiceController::test'); 
// $routes->post('serviceAddTag/(:any)', 'ServiceController::addTag',['filter' => 'auth']);
// // $routes->post('serviceLogin/(:any)/(:any)', 'ServiceController::login');
// $routes->post('/create',  ['as' => $route_slug.'create','uses'    => $module_controller.'create']);

$routes->get("hello", "ServiceController::hello");
$routes->post("serviceLogin", "ServiceController::serviceLogin");
$routes->post("addDrug/(:any)/(:any)/(:any)", "ServiceController::addDrug/$1/$2/$3",['filter' => 'auth']);
$routes->post("deleteDrugData/(:any)", "ServiceController::deleteDrugData/$1",['filter' => 'auth']);
$routes->post("me", "ServiceController::me",['filter' => 'auth']);


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
