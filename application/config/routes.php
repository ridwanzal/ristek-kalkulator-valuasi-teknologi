<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|`
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';

// admin section
$route['manage'] = 'manage';
$route['manage/add/costbased'] = 'manage/add_costbased';
$route['manage/add/incomebased'] = 'manage/add_incomebased';
$route['manage/add/incomebased_invensi'] = 'manage/add_incomebased_invensi';
$route['manage/edit/incomebased_invensi/(:num)'] = 'manage/edit_incomebased_invensi/$1';
$route['manage/delete/incomebased_invensi/(:num)'] = 'incomebased/delete/$1';
$route['manage/delete/incomebased_kalkulasi/(:num)'] = 'incomebased/delete_kalkulasi/$1';
$route['manage/delete/costbased_kalkulasi/(:num)'] = 'costbased/delete_kalkulasi/$1';
$route['incomebased/add'] = 'incomebased/add';
$route['incomebased/sinkronisasi_ipr'] = 'incomebased/sinkronisasi_ipr';
$route['incomebased/data_halaman1'] = 'incomebased/data_halaman1';
$route['incomebased/data_halaman2'] = 'incomebased/data_halaman2';
$route['incomebased/data_halaman3'] = 'incomebased/data_halaman3';
$route['incomebased/simpan_kalkulasi'] = 'incomebased/simpan_kalkulasi';
$route['manage/add/incomebased_calculator'] = 'manage/add_incomebased_calculator';
$route['manage/add/incomebased_calculator1/(:num)'] = 'manage/add_incomebased_calculator1/$1';
$route['manage/add/incomebased_calculator2'] = 'manage/add_incomebased_calculator2';
$route['manage/add/incomebased_calculator3'] = 'manage/add_incomebased_calculator3';
$route['manage/add/incomebased_output'] = 'manage/add_incomebased_output';
$route['manage/riwayat'] = 'manage/riwayat';
$route['manage/riwayat/detail/cost-(:any)'] = 'manage/detail_costbased/$1 ';
$route['manage/riwayat/laporan/cost-(:any)'] = 'manage/report_costbased/$1';
$route['manage/riwayat/laporan/income-(:any)'] = 'manage/report_incomebased/$1';

// front section
$route['login'] = 'login';
$route['auth/login'] = 'login';
$route['logout'] = 'login/logout';
$route['auth/logout'] = 'login/logout';
$route['auth/register'] = 'register';
$route['register'] = 'register';
$route['process_login'] = 'login/process_login';
$route['profile'] = 'profile';
$route['prosedur'] = 'frontview/prosedur';
$route['faq'] = 'frontview/faq';
$route['panduan'] = 'frontview/panduan';
$route['kontak'] = 'frontview/kontak';
$route['kegiatan'] = 'frontview/kegiatan';
$route['tentang'] = 'frontview/tentang';
$route['syaratketentuan'] = 'frontview/syaratketentuan';
$route['privacypolicy'] = 'frontview/privacypolicy';

$route['metode/cost-based'] = 'frontview/costbased';
$route['metode/income-based'] = 'frontview/costbased';
$route['metode/market-based'] = 'frontview/costbased';

$route['metode/costbased'] = 'frontview/costbased';
$route['metode/incomebased'] = 'frontview/costbased';
$route['metode/marketbased'] = 'frontview/costbased';

 

// error or not found page
$route['404_override'] = 'notfound';