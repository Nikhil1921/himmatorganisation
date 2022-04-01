<?php defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = TRUE;

$route['contact'] = 'home/contact';
$route['gallery'] = 'home/gallery';
$route['donate'] = 'home/donate';
$route['donate-online'] = 'home/donate_online';
$route['save-donation'] = 'home/save_donation';
$route['about'] = 'home/about';
$route['compliance'] = 'home/compliance';
$route['privacy-policy'] = 'home/privacy';
$route['refund-policy'] = 'home/refund';
$route['terms-conditions'] = 'home/terms';
$route['media'] = 'home/media';
$route['reports'] = 'home/reports';
$route['partners'] = 'home/partners';
$route['trustee'] = 'home/trustee';
$route['trustee/(:any)'] = 'home/trustee/$1';
$route['programs/(:any)'] = 'home/programs/$1';

$route[ADMIN.'/forgot-password'] = ADMIN.'/login/forgot_password';
$route[ADMIN.'/checkOtp'] = ADMIN.'/login/checkOtp';
$route[ADMIN.'/changePassword'] = ADMIN.'/login/changePassword';
$route[ADMIN.'/banner']['post'] = ADMIN.'/banner/get';
$route[ADMIN.'/media']['post'] = ADMIN.'/media/get';
$route[ADMIN.'/partner']['post'] = ADMIN.'/partner/get';
$route[ADMIN.'/gallery']['post'] = ADMIN.'/gallery/get';
$route[ADMIN.'/compliance']['post'] = ADMIN.'/compliance/get';
$route[ADMIN.'/report']['post'] = ADMIN.'/report/get';
$route[ADMIN.'/trustee']['post'] = ADMIN.'/trustee/get';
$route[ADMIN.'/program']['post'] = ADMIN.'/program/get';
$route[ADMIN.'/donation']['post'] = ADMIN.'/donation/get';