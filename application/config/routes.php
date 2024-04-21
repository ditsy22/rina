<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['p/(:num)/(:any)/(:any)'] = 'home/single/$1/$2/$3';
$route['shops'] = 'home/all_pro';
$route['kontak'] = 'home/kontak_kami';
$route['cari'] = 'home/cari_key';
$route['search'] = 'home/cari_s';
$route['account'] = 'home/akun';
$route['register'] = 'home/signup';
$route['login'] = 'home/sigin';
$route['logout'] = 'home/sigout';
$route['cost'] = 'home/cost';
$route['token'] = 'home/token';
$route['method'] = 'home/met';
$route['forget'] = 'home/fopas';
$route['change'] = 'home/ganti';
