<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/booking', 'BookingController::index');
$routes->post('/booking/searchRooms', 'BookingController::searchRooms');
$routes->post('/room/selectRoom', 'RoomController::selectRoom');
$routes->get('/payment/(:num)', 'PaymentController::index/$1');
$routes->post('/payment/processPayment', 'PaymentController::processPayment');
$routes->get('/payment/success', 'PaymentController::success');


