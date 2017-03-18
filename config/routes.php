<?php defined('BASEPATH') or exit('No direct script access allowed');

// Define routes for public pages.
$route['currencyx'] = 'currencyx/calculator/';
$route['currencyx/([A-Za-z]{3})'] = 'currencyx/calculator/$1';