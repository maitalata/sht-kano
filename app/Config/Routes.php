<?php

namespace Config;

use App\Filters\AuthFilters as FiltersAuthFilters;
use CodeIgniter\Filters\AuthFilters;

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/response', 'Home::response');
$routes->get('/setupPassword/(:num)/(:alphanum)', 'Home::setupPassword/$1/$2');
$routes->get('/verifyRegistrationPayment/(:num)/(:num)', 'Home::verifyRegistrationPayment/$1/$2');
$routes->post('/savePassword', 'Home::savePassword');

$routes->get('/pdfviewer', 'Home::pdfviewer');
$routes->get('/management', 'Management::index', ['filter' => 'authfilters']);
$routes->get('/utilAssign', 'Management::utilAssign', ['filter' => 'authfilters']);
$routes->get('/allStudents', 'Management::allStudents', ['filter' => 'authfilters']);
$routes->get('/allNewStudents', 'Management::allNewStudents', ['filter' => 'authfilters']);
$routes->get('/allStudents2', 'Management::allStudents2', ['filter' => 'authfilters']);
$routes->get('/allStudents3', 'Management::allStudents3', ['filter' => 'authfilters']);
$routes->get('/allStudents4', 'Management::allStudents4', ['filter' => 'authfilters']);
$routes->get('/allStudents5', 'Management::allStudents5', ['filter' => 'authfilters']);
$routes->get('/addStudent', 'Management::addStudent', ['filter' => 'authfilters']);
$routes->get('/addNewStudent', 'Management::addNewStudent', ['filter' => 'authfilters']);
$routes->get('/addNewCourse', 'Management::addNewCourse', ['filter' => 'authfilters']);
$routes->get('/pullStudentFromApplicants', 'Management::pullStudent', ['filter' => 'authfilters']);
$routes->get('/add', 'Management::add', ['filter' => 'authfilters']);
$routes->post('/saveStudent', 'Management::saveStudent', ['filter' => 'authfilters']);
$routes->post('/saveNewStudent', 'Management::saveNewStudent', ['filter' => 'authfilters']);
$routes->post('/saveNewCourse', 'Management::saveNewCourse', ['filter' => 'authfilters']);
$routes->post('/saveJambInfo', 'Management::saveJambInfo', ['filter' => 'authfilters']);
$routes->get('/editStudent/(:num)', 'Management::editStudent/$1', ['filter' => 'authfilters']);
$routes->post('/updateStudent/(:num)', 'Management::updateStudent/$1', ['filter' => 'authfilters']);
$routes->get('/deleteStudent/(:num)', 'Management::deleteStudent/$1', ['filter' => 'authfilters']);
$routes->get('/student/(:num)', 'Management::student/$1', ['filter' => 'authfilters']);
$routes->get('/confirmAcceptanceAndMedicalFees/(:num)', 'Management::confirmAcceptanceAndMedicalFees/$1', ['filter' => 'authfilters']);

$routes->post('/loginChecker', 'Student::loginChecker');
$routes->post('/registerHandler', 'Student::registerHandler');
$routes->get('/studentLogout', 'Student::logout');
$routes->get('/util', 'Student::util');
$routes->get('/studentDashboard', 'Student::index', ['filter' => 'studentauthfilter']);
$routes->get('/passport', 'Student::passport', ['filter' => 'studentauthfilter']);
$routes->get('/registrationReceipt', 'Student::registrationReceipt', ['filter' => 'studentauthfilter']);
$routes->get('/util2', 'Student::util2', ['filter' => 'studentauthfilter']);
$routes->get('/examCard', 'Student::examCard', ['filter' => 'studentauthfilter']);
$routes->get('/res', 'Student::res', ['filter' => 'studentauthfilter']);
$routes->get('/pay', 'Student::pay', ['filter' => 'studentauthfilter']);
$routes->get('/paymentVerify', 'Student::paymentVerify', ['filter' => 'studentauthfilter']);
$routes->get('/payAcceptance', 'Student::payAcceptance', ['filter' => 'studentauthfilter']);
$routes->get('/payInduction', 'Student::payInduction', ['filter' => 'studentauthfilter']);
$routes->get('/payMedical', 'Student::payMedical', ['filter' => 'studentauthfilter']);
$routes->get('/payRegistration', 'Student::payRegistration', ['filter' => 'studentauthfilter']);
$routes->get('/payReturningRegistration', 'Student::payReturningRegistration', ['filter' => 'studentauthfilter']);
$routes->post('/savePassport', 'Student::savePassport', ['filter' => 'studentauthfilter']);

service('auth')->routes($routes);

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
