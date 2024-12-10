<?php defined('BASEPATH') OR exit('No direct script access allowed');

// 商品分類
$route['category/(:any)']        = 'posts/category/$1';
$route['posts/(:any)']           = 'posts/view/$1';
// 頁面
$route['/']                      = 'home';
$route['about']                  = 'about';
$route['contact']                = 'contact';
// 其他
$route['admin/export/users']     = 'admin/export/users';
$route['backup_db']              = 'others/backup_db';

//////////////////////////////////////////////////////////////////////////////////////

$route['sitemap\.xml']           = "Sitemap/index";
// $route['(.+)']                = "page";
$route['(:any)']                 = "pages";
$route['default_controller']     = 'home';
$route['404_override']           = '';
$route['translate_uri_dashes']   = TRUE;