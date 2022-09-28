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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = "home";

//admin
$route['admin'] = "admin";
$route['admin/(:any)'] = "admin/$1";

// About us
 $route['about-us'] = 'about_us/index';

//checkout
 $route['checkout'] = 'checkout/index';

 // Product
 $route['product'] = 'products/index';
 $route['payment/(:any)'] = 'get_payment/index';
 
 $route['get_payment/error'] = 'get_payment/error';
 
 //$route['payment'] = 'get_payment/index';

 //$route['products/(:any)'] = 'products/index';
 //$route['product-detail'] = 'products/detail';


 // Contact
 $route['contact-us'] = 'contact_us/index';


//frontend slugs
$route['dologin'] = "home/login";
$route['translate_uri_dashes'] = true;

// login 
// $route['sign-in'] = "account/do_login";
// $route['sign-up'] = "signup/index";

$route['forgot-password'] = "forgot_password/index";

//home / detail 
$route['product-detail/(:any)'] = "products/detail";


/** Account **/
$route['login'] = "account/login";
$route['signup'] = "signup/signup";
$route['account/do_login'] = "account/do_login";
$route['register'] = "account/register";
$route['logout'] = "account/logout";
$route['my-account'] = "account/index";
$route['my-account/profile'] = "account/profile";
$route['my-account/info'] = "account/info";
$route['my-account/change-password'] = "account/change_password";
$route['my-account/order-history'] = "account/orderhistory";
$route['my-account/my-wishlist'] = "account/mywishlist";
$route['my-account/forgot-password'] = "account/forgotpassword";
$route['my-account/reset-password'] = "account/resetpassword";