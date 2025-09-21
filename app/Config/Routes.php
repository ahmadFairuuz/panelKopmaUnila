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
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// Dashboard
$routes->get('/', 'Dashboard::index');

// Kegiatan
$routes->get('/dashboard/kegiatan/(:any)', 'Dashboard::qr_code/$1');
$routes->get('/dashboard/data_kegiatan', 'Dashboard::data_kegiatan');

// Humas (admin + humas + staff)
$routes->group('humas', ['filter' => 'username:admin,humas,staff'], function ($routes) {
    $routes->get('alumni', 'Humas::alumni');
    $routes->post('save_alumni', 'Humas::save_alumni');
    $routes->post('update_alumni', 'Humas::update_alumni');
    $routes->delete('delete_alumni/(:any)', 'Humas::delete_alumni/$1', ['filter' => 'username:admin,humas']);
});

// Administrasi (admin + administrasi)
$routes->group('administrasi', ['filter' => 'username:admin,administrasi'], function ($routes) {
    $routes->get('surat_masuk', 'Administrasi::surat_masuk');
    $routes->get('surat_keluar', 'Administrasi::surat_keluar');
    $routes->get('digilib', 'Administrasi::digilib');
});

// PSDA (admin + psda + staff khusus data_anggota)
$routes->group('psda', ['filter' => 'username:admin,psda,staff'], function ($routes) {
    $routes->get('calon_anggota', 'Psda::calon_anggota', ['filter' => 'username:admin,psda']);
    $routes->get('data_anggota', 'Psda::data_anggota');
    $routes->get('data_poin', 'Psda::data_poin', ['filter' => 'username:admin,psda']);
    $routes->get('kode_referal', 'Psda::kode_referal', ['filter' => 'username:admin,psda']);
});

// Usaha (admin + usaha)
$routes->group('usaha', ['filter' => 'username:admin,usaha'], function ($routes) {
    $routes->get('produk', 'Usaha::produk');
});

// Keuangan (admin + keuangan)
$routes->group('keuangan', ['filter' => 'username:admin,keuangan'], function ($routes) {
    $routes->get('data_simpanan', 'Keuangan::data_simpanan');
    $routes->get('pembayaran_simwa', 'Keuangan::pembayaran_simwa');
    $routes->get('laporan_keuangan', 'Keuangan::laporan_keuangan');
});

// Litbang (admin + litbang)
$routes->group('litbang', ['filter' => 'username:admin,litbang'], function ($routes) {
    $routes->get('survey_berjalan', 'Litbang::survey_berjalan');
    $routes->get('hasil_survey', 'Litbang::hasil_survey');
});

// Admin Panel (hanya admin)
$routes->group('admin', ['filter' => 'username:admin'], function ($routes) {
    $routes->get('data_user', 'Admin::data_user');
    $routes->get('akun_juko', 'Admin::akun_juko');
});



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
