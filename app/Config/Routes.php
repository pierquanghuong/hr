<?php

use CodeIgniter\Router\RouteCollection;
use Modules\QuaTang\Controllers\QuaTang;
/*
 * @var RouteCollection $routes
 */
$routes->get('/', [QuaTang::class, 'intro']); //Khai bao home

service('auth')->routes($routes); //route Shield package

/**
 * Khai báo route module hr game
 */
$routes->group(
    'tangqua', ['namespace' => 'Modules\QuaTang\Controllers'], function ($routes) {
        $routes->get('/', 'QuaTang::index');
        $routes->get('scan/(:any)/(:any)', 'QuaTang::index/$1/$2');
        $routes->post('/','QuaTang::store'); 
    }
);
//for admin hr game
$routes->group(
    'admin/hr-game', ['namespace' => 'App\Modules\QuaTang\Controllers'], function ($routes) {
       $routes->get('/','HrGameAdmin::index');
       $routes->get('detail/(:num)', 'HrGameAdmin::edit/$1');
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