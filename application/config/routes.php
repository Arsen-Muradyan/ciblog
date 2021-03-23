<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["posts"] = "posts/index";
$route['posts/(:num)'] = 'posts/view/$1';
$route['posts/create'] = 'posts/create';
$route['posts/edit/(:num)'] = 'posts/edit/$1';
$route['posts/delete/(:num)']["post"] = "posts/delete/$1";
// User routes
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/logout'] = 'users/logout';
// Pages Routes
$route['dashboard'] = 'pages/dashboard';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;