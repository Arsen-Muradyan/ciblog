<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route["posts"] = "posts/index";
$route['posts/(:num)'] = 'posts/view/$1';
$route['posts/create'] = 'posts/create';
$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';



$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;