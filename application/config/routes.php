<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'user';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user/login'] = 'user/login';
$route['dashboard'] = 'dashboard';
$route['user-login'] = 'user/logout';

$route['product/add-prod'] = 'productlist/save'; // add table data product
$route['product-loadprod'] = 'productlist/load_Prod'; //get table data product
$route['product/del-prod'] = 'productlist/delete'; // delete table data product
$route['product/edit-prod'] = 'productlist/update'; // edit table product

