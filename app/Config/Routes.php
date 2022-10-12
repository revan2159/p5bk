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

//// $routes->get('/', 'Home::index');    // default route
////$routes->group('/', ['filter' => 'role:guru,admin'], function($routes){
////$routes->get('admin', 'admin::index');
////$routes->get('guru', 'guru::index');
//
//});    // default route

$routes->get('/', 'Home::index');

$routes->get('admin/dashboard', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('guru/dashboard', 'Guru::index', ['filter' => 'role:guru']);
$routes->get('profil', 'Admin::profil', ['as' => 'admin_profil']);
$routes->get('data-sekolah', 'Admin::data_sekolah', ['as' => 'data-sekolah']);
$routes->post('ubah-sekolah', 'DataSekolah::ubah_sekolah', ['as' => 'ubah-sekolah', 'filter' => 'role:admin']);
$routes->get('data-siswa', 'Siswa::index', ['as' => 'data-siswa']);
$routes->get('data-guru', 'DataSekolah::data_guru', ['as' => 'data-guru']);
$routes->get('data-kelas', 'Kelas::index', ['as' => 'data-kelas']);
$routes->get('data-p5bk', 'P5bk::capaian', ['as' => 'data-p5bk']);
$routes->get('capaian/(:num)', 'P5bk::capaian/$1', ['filter' => 'role:guru,admin']);
$routes->get('perencanaan', 'P5bk::index', ['as' => 'perencanaan', 'filter' => 'role:guru,admin']);
$routes->get('perencanaan/(:num)', 'P5bk::hapus_rencana/$1', ['filter' => 'role:guru,admin']);
$routes->post('tambah-rencana', 'P5bk::tambah_rencana', ['as' => 'tambah-rencana', 'filter' => 'role:guru,admin']);
$routes->post('tambah-aspek', 'P5bk::simpan_aspek', ['as' => 'simpan-aspek', 'filter' => 'role:guru,admin']);
// $routes->get('aspek', 'Aspek::index', ['as' => 'set-aspek']);
$routes->get('penilaian', 'Penilaian::index', ['as' => 'penilaian', 'filter' => 'role:guru,admin']);
$routes->post('save', 'Penilaian::save', ['as' => 'input-nilai', 'filter' => 'role:guru,admin']);
$routes->get('laporan', 'Laporan::index', ['as' => 'laporan', 'filter' => 'role:guru,admin']);
$routes->get('laporan/preview/(:num)', 'Laporan::preview_nilai/$1', ['filter' => 'role:guru,admin']);
$routes->get('laporan/cetak/(:num)', 'Laporan::cetak/$1', ['filter' => 'role:guru,admin']);
$routes->post('catatan/update', 'Laporan::update_catatan', ['as' => 'update-catatan', 'filter' => 'role:guru,admin']);
$routes->post('catatan/tambah', 'Laporan::tambah_catatan', ['as' => 'tambah-catatan', 'filter' => 'role:guru,admin']);
// });








//router for update, delete, and insert data


// $routes->group('guru', ['filter' => 'role:guru'], function ($routes) {
//     $routes->get('dashboard', 'Guru::index');
//     $routes->get('profil', 'Guru::profil', ['as' => 'guru_profil']);
//     $routes->get('perencanaan', 'P5bk::index', ['as' => 'guru-perencanaan']);
// });



$routes->group('siswa', ['filter' => 'role:siswa'], function ($routes) {
    //
});




//$routes->get('/register', 'Home::register');
//$routes->get('/guru', 'Home::guru');

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
