<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'frontend';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['auth/(:any)'] = 'auth/$1';
$route['auth/(:any)/(:any)'] = 'auth/$1/$2';

$route['api/(:any)'] = 'api/$1';
$route['api/(:any)/(:any)'] = 'api/$1/$2';
$route['api/(:any)/(:any)/(:any)'] = 'api/$1/$2/$3';
//admin 
$route['admin'] = 'admin';
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';


$route['admin/(:any)'] = 'admin_con/$1';
$route['admin/(:any)/(:any)'] = 'admin_con/$1/$2';
$route['admin/(:any)/(:any)/(:any)'] = 'admin_con/$1/$2/$3';





$route['(:any)'] = 'frontend/$1';
$route['(:any)/(:any)'] = 'frontend/$1/$2';
$route['(:any)/(:any)/(:any)'] = 'frontend/$1/$2/$3';


$route['(:any)/(:any)'] = 'frontend/product/$1/$2';


$route['(:any)'] = 'frontend/all/$1';


