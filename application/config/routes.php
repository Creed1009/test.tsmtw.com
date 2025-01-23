<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Admin
$route['admin'] = 'admin/dashboard';
$route['admin/access'] = 'dashboard/access';
$route['admin/update_access'] = 'dashboard/update_access';
$route['admin/single_access/(:num)'] = 'dashboard/single_access/$1';
$route['admin/update_single_access/(:num)']= 'dashboard/update_single_access/$1';
$route['check/session'] = 'dashboard/checkSession';
$route['setting_general'] = 'dashboard/setting_general';
$route['update_setting_general'] = 'dashboard/update_setting_general';
$route['logout'] = 'admin/login/logout';

// 商品分類
$route['category/(:any)']        = 'posts/category/$1';
$route['posts/(:any)']           = 'posts/view/$1';
// 頁面
$route['/']                      = 'home';
$route['about']                  = 'about';
$route['contact']                = 'contact';
$route['products']               = 'products';
$route['posts']                  = 'posts';
$route['posts']                  = 'posts/index';
$route['contact']                = 'contact/index';
$route['contact/insert']         = 'contact/insert';
// 其他
$route['admin/export/users']     = 'admin/export/users';
$route['backup_db']              = 'others/backup_db';

//////////////////////////////////////////////////////////////////////////////////////

$route['sitemap\.xml']           = "Sitemap/index";
// $route['(.+)']                = "page";
// $route['(:any)']                 = "pages";
$route['default_controller']     = 'home';
$route['404_override']           = '';
$route['translate_uri_dashes']   = TRUE;