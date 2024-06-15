<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->setDefaultNamespace('App\Controllers');
//  $routes->setDefaultController('Home');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);

$routes->get('/', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
$routes->get('logout', 'AuthController::logout', ['as' => 'admin.logout']);
$routes->get('/no-access-page', function () {
    return view('no_access');
});



// Dashboard routes for different roles with RBAC filter
$routes->get('admin/home', 'HomeController::index/admin', ['filter' => 'rbac:admin']);
$routes->get('teacher/home', 'HomeController::index/teacher', ['filter' => 'rbac:teacher']);
$routes->get('student/home', 'HomeController::index/student', ['filter' => 'rbac:student']);
$routes->get('superadmin/home', 'HomeController::index/superadmin', ['filter' => 'rbac:superadmin']);
$routes->get('student_service/home', 'HomeController::index/student_service', ['filter' => 'rbac:student_service']);


$routes->get('admin/add-student', 'AdminController::addStudentForm', ['filter' => 'rbac:admin']);
$routes->get('superadmin/add-student', 'AdminController::addStudentForm', ['filter' => 'rbac:superadmin']);
$routes->post('admin/add-student', 'AdminController::addStudent', ['filter' => 'rbac:admin']);
$routes->post('superadmin/add-student', 'AdminController::addStudent', ['filter' => 'rbac:superadmin']);


$routes->get('admin/show-students', 'AdminController::showStudents', ['filter' => 'rbac:admin']);
$routes->get('superadmin/show-students', 'AdminController::showStudents', ['filter' => 'rbac:superadmin']);
$routes->get('superadmin/show-students', 'AdminController::showStudents', ['filter' => 'rbac:student_service']);

$routes->post('admin/show-students', 'AdminController::showStudents', ['filter' => 'rbac:admin']);
$routes->post('superadmin/show-students', 'AdminController::showStudents', ['filter' => 'rbac:superadmin']);
$routes->post('admin/show-students', 'AdminController::showStudents', ['filter' => 'rbac:admin']);
// $routes->setDefaultController('index');
// $routes->setAutoRoute(true);



// $routes->group('admin', static function ($routes) { //only

//     $routes->group('', [], static function ($routes) {
//         // $routes->view('example-page', 'example-page');
//         $routes->get('home', 'AdminController::index', ['as' => 'admin.home']);
//         $routes->get('logout', 'AdminController::logoutHandler', ['as' => 'admin.logout']);
//     });

//     $routes->group('', [], static function ($routes) {
//         $routes->view('example-auth', 'example-auth');
//         $routes->get('login', 'AuthController::loginForm', ['as' => 'admin.login.form']);
//         $routes->post('login', 'AuthController::loginHandler', ['as' => 'admin.login.handler']);
//     });
// });


// // Routes.php
// $routes->group('admin', ['filter' => 'rbac:admin_access'], function($routes) {
//     $routes->get('/', 'AdminController::index');
//     // Other admin routes
// });

// $routes->group('teacher', ['filter' => 'rbac:teacher_access'], function($routes) {
//     $routes->get('/', 'TeacherController::index');
//     // Other teacher routes
// });
