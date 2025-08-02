<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/tambah', 'Form_Controller::tambah');
$routes->get('/crud', 'Crud::index');
$routes->get('/crud/tambah', 'Crud::tambah');
$routes->get('/crud/hapus', 'Crud::edit');
$routes->get('/crud/editan', 'Crud::editan');
$routes->get('/crud/tambah', 'Crud::tambah');
$routes->post('/crud/simpan', 'Crud::simpan');
$routes->get('/crud/view', 'Crud::view');
$routes->get('/crud/edit/(:num)', 'Crud::edit/$1');
$routes->post('/crud/update/(:num)', 'Crud::update/$1');
$routes->get('/buku', 'Buku::index');
$routes->get('/buku/create', 'Buku::create');
$routes->post('/buku/store', 'Buku::store');
$routes->get('/buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('/buku/update/(:num)', 'Buku::update/$1');
$routes->get('/buku/delete/(:num)', 'Buku::delete/$1');