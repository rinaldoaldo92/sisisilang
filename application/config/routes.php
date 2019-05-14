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
|
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
$route['default_controller'] = 'konten/beranda';
/*admin-pelayanrakyat*/
$route['pelayanrakyat/validasi'] = 'pelayanrakyat/validasi';
$route['pelayanrakyat/login'] = 'pelayanrakyat/login';
$route['pelayanrakyat'] = 'pelayanrakyat/utama/index';
$route['pelayanrakyat/logout'] = 'pelayanrakyat/logout';
$route['pelayanrakyat/dashboard/halaman'] = 'pelayanrakyat/halaman';
$route['pelayanrakyat/dashboard/buathalaman'] = 'pelayanrakyat/buathalaman';
$route['pelayanrakyat/dashboard/buat'] = 'pelayanrakyat/buat';
$route['pelayanrakyat/dashboard/updatepengguna/(:any)'] = 'pelayanrakyat/updatepengguna/$1';
$route['pelayanrakyat/dashboard/tambahpengguna'] = 'pelayanrakyat/tambahpengguna';
$route['pelayanrakyat/dashboard/updatehalaman/(:any)'] = 'pelayanrakyat/updatehalaman/$1';
$route['pelayanrakyat/dashboard/updateartikel/(:any)'] = 'pelayanrakyat/updateartikel/$1';
$route['pelayanrakyat/dashboard/deletepengguna/(:any)'] = 'pelayanrakyat/deletepengguna/$1';
$route['pelayanrakyat/dashboard/deleteartikel/(:any)'] = 'pelayanrakyat/deleteartikel/$1';
$route['pelayanrakyat/dashboard/deletehalaman/(:any)'] = 'pelayanrakyat/deletehalaman/$1';
$route['pelayanrakyat/dashboard/administrasi'] = 'pelayanrakyat/tulis';
$route['pelayanrakyat/dashboard/gantiava'] = 'pelayanrakyat/gantiava';
$route['pelayanrakyat/dashboard/ubahpass'] = 'pelayanrakyat/ubahpass';
$route['pelayanrakyat/dashboard/highlight'] = 'pelayanrakyat/highlight';
$route['pelayanrakyat/dashboard/infografis'] = 'pelayanrakyat/infografis';
$route['pelayanrakyat/dashboard/buathighlight'] = 'pelayanrakyat/buathighlight';
$route['pelayanrakyat/dashboard/updatehighlight/(:any)'] = 'pelayanrakyat/updatehighlight/$1';
$route['pelayanrakyat/dashboard/deletehighlight/(:any)'] = 'pelayanrakyat/deletehighlight/$1';
$route['pelayanrakyat/dashboard/buatkategori'] = 'pelayanrakyat/buatkategori';
$route['pelayanrakyat/dashboard/updatekategori/(:any)'] = 'pelayanrakyat/updatekategori/$1';
$route['pelayanrakyat/dashboard/deletekategori/(:any)'] = 'pelayanrakyat/deletekategori/$1';
$route['pelayanrakyat/dashboard/buatinfografis'] = 'pelayanrakyat/buatinfografis';
$route['pelayanrakyat/dashboard/updateinfografis/(:any)'] = 'pelayanrakyat/updateinfografis/$1';
$route['pelayanrakyat/dashboard/deleteinfografis/(:any)'] = 'pelayanrakyat/deleteinfografis/$1';
$route['pelayanrakyat/dashboard/buatmenu'] = 'pelayanrakyat/buatmenu';
$route['pelayanrakyat/dashboard/updatemenu/(:any)'] = 'pelayanrakyat/updatemenu/$1';
$route['pelayanrakyat/dashboard/deletemenu/(:any)'] = 'pelayanrakyat/deletemenu/$1';
$route['pelayanrakyat/dashboard/kategori'] = 'pelayanrakyat/kategori';
$route['pelayanrakyat/dashboard/listpengguna'] = 'pelayanrakyat/listpengguna';
$route['pelayanrakyat/dashboard/profil'] = 'pelayanrakyat/profil';
$route['pelayanrakyat/dashboard/beranda'] = 'pelayanrakyat/beranda';
$route['pelayanrakyat/dashboard'] = 'pelayanrakyat/beranda';
$route['pelayanrakyat/dashboard/(:any)'] = 'pelayanrakyat/administrator/$1';
/*konten*/
$route['konten/(:any)'] = 'konten/halaman/$1';
$route['konten'] = 'konten/beranda';
/*narasi*/
$route['narasi/siber/(:any)'] = 'narasi/category/siber/$1';
$route['narasi/kupas/(:any)'] = 'narasi/category/kupas/$1';
$route['narasi/programming/(:any)'] = 'narasi/category/programming/$1';
$route['narasi/media/(:any)'] = 'narasi/category/media/$1';
$route['narasi/media'] = 'narasi/category/media';
$route['narasi/siber'] = 'narasi/category/siber';
$route['narasi/programming'] = 'narasi/category/programming';
$route['narasi/kupas'] = 'narasi/category/kupas';
$route['narasi/user/(:any)'] = 'narasi/user/$1';
$route['narasi/user'] = 'narasi/user';
$route['narasi/penulis/(:any)'] = 'narasi/penulis/$1';
$route['narasi/penulis'] = 'narasi/penulis';
$route['narasi/(:any)'] = 'narasi/view/$1';
$route['narasi'] = 'narasi/view';
/*infografis*/
$route['infografis/view/(:any)'] = 'infografis/view/$1';
$route['infografis/(:any)'] = 'infografis/category/$1';
$route['infografis'] = 'infografis/category';
/*sisivlog*/
$route['sisivlog'] = 'sisivlog/view/index';
$route['sisivlog/(:any)'] = 'sisivlog/view/$1';
/*engineering*/
$route['engineering'] = 'engineering/engineer';
$route['engineering/(:any)'] = 'engineering/engineer/$1';
/*testing-news*/
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news/index';
/*testing-upload*/
$route['upload'] = 'upload/index';
/*testing-autocomplete*/
$route['testautocomplete'] = 'testautocomplete/get_autocomplete';