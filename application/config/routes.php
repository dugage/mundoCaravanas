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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//rutas para customers
$route['clientes'] = 'customers';
$route['clientes/add'] = 'customers/add';
$route['clientes/edit/(:num)'] = 'customers/edit/$1';
$route['clientes/delete/(:num)'] = 'customers/delete/$1';
$route['clientes/vehiculos/delete/(:num)'] = 'customers/deleteVehicle/$1';
$route['clientes/doc/(:num)'] = 'customers/showDoc/$1';
//rutas para paytypes
$route['tipos-de-pago'] = 'paytypes';
$route['tipos-de-pago/add'] = 'paytypes/add';
$route['tipos-de-pago/edit/(:num)'] = 'paytypes/edit/$1';
$route['tipos-de-pago/delete/(:num)'] = 'paytypes/delete/$1';

//rutas para vehiclesbrands
$route['marcas'] = 'vehiclebrands';
$route['marcas/add'] = 'vehiclebrands/add';
$route['marcas/edit/(:num)'] = 'vehiclebrands/edit/$1';
$route['marcas/delete/(:num)'] = 'vehiclebrands/delete/$1';
//rutas para vehiclestypes
$route['tipos'] = 'vehicletypes';
$route['tipos/add'] = 'vehicletypes/add';
$route['tipos/edit/(:num)'] = 'vehicletypes/edit/$1';
<<<<<<< HEAD
$route['tipos/delete/(:num)'] = 'vehicletypes/delete/$1';
=======
//rutas Administración Parking
$route['administrar-parking'] = 'parkingadmin';
$route['administrar-parking/add'] = 'parkingadmin/add';
$route['administrar-parking/edit/(:num)'] = 'parkingadmin/edit/$1';
$route['administrar-parking/delete/(:num)'] = 'parkingadmin/delete/$1';
>>>>>>> 0c85923b296163f1298486255cfe3b821842ea06
