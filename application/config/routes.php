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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';  // Set the default controller to 'users'
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['contact'] = 'contact/index';
$route['contact/submit'] = 'contact/submit';

$route['logout'] = 'logout/index';

    //Admin Side routes//
 // Custom routes for  Users Fomr
$route['admin/users'] = 'admin/users/index';
$route['admin/users/create'] = 'admin/user_create';
$route['admin/users/store'] = 'admin/user_store';
$route['admin/users/edit/(:num)'] = 'admin/user_edit/$1';
$route['admin/users/update/(:num)'] = 'admin/user_update/$1';
$route['admin/users/delete/(:num)'] = 'admin/user_delete/$1';


    // Custom routes for  Admin Users Fomr
$route['admin/admin_user'] = 'admin/admin_user';
$route['admin/admin_user/create'] = 'admin/admin_create';  // Shows form
$route['admin/admin_user/store']  = 'admin/admin_store';
$route['admin/admin_user/edit/(:num)'] = 'admin/admin_edit/$1';
$route['admin/admin_user/update/(:num)'] = 'admin/admin_update/$1';
$route['admin/admin_user/delete/(:num)'] = 'admin/admin_delete/$1';


    // Custom routes for  Admin side message Fomr//

   
$route['admin/message/delete/(:num)']='admin/message';
$route['admin/message/delete/(:num)'] = 'admin/message_delete/$1';


$route['admin/message/message_reply_form/(:num)'] = 'admin/message_reply_form/$1';
$route['admin/message/send_reply'] = 'admin/send_reply';
$route['admin/message/send_auto_reply'] = 'admin/send_auto_reply';
