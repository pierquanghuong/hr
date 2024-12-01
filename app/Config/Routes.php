<?php

use Modules\Home\Controllers\Home;
/*
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']); //Khai bao home
$routes->get('scan/(:any)/(:any)', [Home::class, 'index/$1/$2']); //route scan home
service('auth')->routes($routes); //route Shield package

/**
 * Route Module NhanVien
 */
$routes->group(
    'nhanvien', ['namespace' => 'Modules\NhanVien\Controllers'], function ($routes) {
        $routes->get('search-ajax', 'NhanVien::search_ajax');
    }
);
/**
 * Route Admin module Nhanvien
 */
$routes->group(
    'admin/nhanvien', ['namespace' => 'App\Modules\NhanVien\Controllers'], function ($routes) {
        $routes->get('/', 'NhanVienAdmin::index');
        $routes->get('import', 'NhanVienAdmin::import');
        $routes->post('import', 'NhanVienAdmin::postImport');
        $routes->get('import-excel', 'NhanVienAdmin::importExcel');
        $routes->post('import-excel', 'NhanVienAdmin::storeExcel');
        $routes->post('create', 'NhanVienAdmin::store');
        $routes->get('resetdata', 'NhanVienAdmin::resetNvData'); //xóa toàn bộ dữ liệu nhân viên
    }
);

/**
 * Route module setting
 */
$routes->group(
    'admin/settings', ['namespace' => 'App\Modules\Admin\Controllers'], function ($routes) {
        $routes->get('/', 'Setting::index');
    }
);

/*
* Khai báo route cho BaseAdmin
*/
$routes->group(
    'admin', ['namespace' => 'Modules\Admin\Controllers'], function ($routes) {
        $routes->get('/', 'Admin::index');
    }
);

/************************************************************************************************
 * Khai báo route module hr game tang qua 
 */
$routes->group(
    'tangqua', ['namespace' => 'Modules\QuaTang\Controllers'], function ($routes) {
        $routes->get('/', 'QuaTang::index', ['filter' => 'checkScan']);
        $routes->post('/','QuaTang::store', ['filter' => 'checkScan']);
        $routes->addRedirect('scan/(:any)/(:any)', 'scan/$1/$2');
    }
);
//for admin hr game
$routes->group(
    'admin/hr-game', ['namespace' => 'App\Modules\QuaTang\Controllers'], function ($routes) {
       $routes->get('/','HrGameAdmin::index');
       $routes->get('detail/(:num)', 'HrGameAdmin::edit/$1');
       $routes->post('edit', 'HrGameAdmin::store');
       $routes->get('statistic', 'HrGameAdmin::statistic');
       $routes->get('settings', 'HrGameAdmin::settings');
       $routes->post('settings', 'HrGameAdmin::storeSettings');
    }
);

$routes->group(
    'api/hr-game', ['namespace' => 'App\Modules\QuaTang\Controllers'], function ($routes) {
        $routes->get('count/(:num)', 'ApiQuaTang::getTop/$1');
    }
);
//***********************************************************************************************

/************************************************************************************************
 * Khai báo route module vote
 */
$routes->group(
    'vote', ['namespace' => 'Modules\Vote\Controllers'], function ($routes) {
        $routes->get('/', 'Vote::index', ['filter' => 'checkScan']); 
        $routes->get('award/(:any)', 'Vote::award/$1', ['filter' => 'checkScan']);
        $routes->post('award', 'Vote::storeAward', ['filter' => 'checkScan']);
    }
);
/**
 * Khai báo route cho vote admin
 */
$routes->group(
    'admin/vote', ['namespace' => 'Modules\Vote\Controllers'], function ($routes) {
        $routes->get('/', 'VoteAdmin::index');
        $routes->get('resetdata', 'VoteAdmin::deleteAllVotes'); //xóa toàn bộ dữ liệu vote - sử dụng cho test
    }
);
//***********************************************************************************************