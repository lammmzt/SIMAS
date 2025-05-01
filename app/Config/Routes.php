<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Pengumuman', 'LandingPage::Pengumuman');

$routes->setAutoRoute(true);