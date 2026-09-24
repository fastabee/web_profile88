<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('produk', 'Produk::index');
$routes->get('tentang', 'Tentang::index');
$routes->get('karir', 'Karir::index');

// Admin routes
$routes->get('admin', 'Admin::index');
$routes->post('admin/login', 'Admin::login');
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/logout', 'Admin::logout');

// Admin Produk routes
$routes->get('admin/produk', 'Admin\Produk::index');
$routes->post('admin/produk/create', 'Admin\Produk::create');
$routes->post('admin/produk/update/(:num)', 'Admin\Produk::update/$1');
$routes->get('admin/produk/delete/(:num)', 'Admin\Produk::delete/$1');

// Admin Loker routes
$routes->get('admin/loker', 'Admin\Loker::index');
$routes->post('admin/loker/create', 'Admin\Loker::create');
$routes->post('admin/loker/update/(:num)', 'Admin\Loker::update/$1');
$routes->get('admin/loker/delete/(:num)', 'Admin\Loker::delete/$1');
$routes->get('admin/loker/restore/(:num)', 'Admin\Loker::restore/$1');
$routes->get('admin/loker/get-persyaratan/(:num)', 'Admin\Loker::getPersyaratan/$1');

// Admin pelamar routes
$routes->get('admin/pelamar', 'Admin\DaftarPelamar::index');
$routes->get('admin/pelamar/detail/(:num)', 'Admin\DaftarPelamar::detail/$1');
$routes->post('admin/pelamar/update-status', 'Admin\DaftarPelamar::updateStatus');
$routes->get('admin/pelamar/cetak/(:num)', 'Admin\DaftarPelamar::cetak/$1');

// User routes
$routes->get('user', 'User::index');
$routes->post('user/login', 'User::login');
$routes->post('user/register', 'User::register');
$routes->get('user/dashboard', 'User::dashboard');
$routes->get('user/profile', 'User::profile');
$routes->post('user/profile/update', 'User::updateProfile');
$routes->get('user/lowongan', 'User::lowongan');
$routes->get('user/lowongan/(:num)', 'User::detailLowongan/$1');
$routes->post('user/lamaran/submit/(:num)', 'User::submitLamaran/$1');
$routes->get('user/lamaran', 'User::lamaran');
$routes->get('user/lamaran/detail/(:num)', 'User::detailLamaran/$1');
$routes->get('user/logout', 'User::logout');
