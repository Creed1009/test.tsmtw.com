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
$route['products/(:num)']        = 'products/view/$1';
//$route['posts']                  = 'posts';
$route['posts/update/(:num)']    = 'posts/update/$1';
$route['posts']                  = 'posts/index';
$route['posts/filter']           = 'posts/filter';
//$route['contact']                = 'contact/index';
$route['contact/insert']         = 'contact/insert';
$route['cart']                   = 'cart/index';
$route['cart/add']               = 'cart/add';
$route['cart/remove/(:any)']     = 'cart/remove/$1';
$route['cart/save_to_db']        = 'cart/save_to_db';
$route['checkout']               = 'pages/checkout';
// $route['api/products']
$route['api/products']['GET']           = 'api/products_api/index';
$route['api/products/(:num)']['GET']    = 'api/products_api/show/$1';
$route['api/products']['POST']          = 'api/products_api/store';
$route['api/products/(:num)']['PUT']    = 'api/products_api/update/$1';
$route['api/products/(:num)']['DELETE'] = 'api/products_api/delete/$1';
// 其他
$route['admin/export/users']     = 'admin/export/users';
$route['backup_db']              = 'others/backup_db';

//////////////////////////////////////////////////////////////////////////////////////

$route['sitemap\.xml']           = "Sitemap/index";
// $route['(.+)']                  = "page";
// $route['(:any)']                = "pages";
$route['default_controller']     = 'home';
$route['404_override']           = '';
$route['translate_uri_dashes']   = TRUE;