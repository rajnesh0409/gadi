<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['default_controller'] = "admin/adminlogin";
$route['default_controller'] = "site/landing";
$route['contact_us'] = "site/landing/contact_us";
$route['how-it-works'] = "site/landing/how_it_works";
$route['booking-service'] = "site/landing/booking_service";
$route['become-a-partner'] = "site/landing/become_partner";
$route['signup'] = "site/user/signup_form";
$route['register'] = "site/user/register_user";
$route['login'] = "site/user/login_form";
$route['forget-password'] = "site/user/forget_form";
$route['forget'] = "site/user/forget";

$route['forget-link/(:any)'] = "site/user/forget_link_form";
$route['forgetlink'] = "site/user/forget_link";

$route['profile'] = "site/user/profile";
$route['change-password'] = "site/user/change_password";
$route['changepassword'] = "site/user/changepassword";
$route['edit-detail'] = "site/user/edit_detail";
$route['editdetail'] = "site/user/editdetail";
$route['login-user'] = "site/user/login";
$route['logout'] = "site/logout/logout_user";
$route['forgot-password'] = "site/user/forgot_password_form";
$route['terms-of-use'] = "site/user/terms_of_use";
$route['become-partner'] = "site/user/become_partner_register";

$route['choosebrands'] = "site/vehicles/choosebrands";
$route['add-vehicle'] = "site/vehicles/add_vehicle";
$route['delete-vehicle/(:any)'] = "site/vehicles/delete_vehicle";
$route['my-vehicles'] = "site/vehicles/view_vehicle";
$route['edit-vehicle/(:any)'] = "site/vehicles/edit_vehicle";
$route['editvehicle'] = "site/vehicles/editvehicle";
$route['stores'] = "site/stores/stores";
$route['schedule-service'] = "site/stores/sch_service";
$route['schedule-services'] = "site/stores/sch_services";
$route['service-cats/(:any)'] = "site/stores/service_cats";
$route['booking-detail'] = "site/stores/booking_detail";
$route['booking-details'] = "site/stores/booking_details";
$route['additional-repairs/(:any)'] = "site/stores/additional_repairs";
$route['repairs/(:any)'] = "site/stores/repairs";
$route['service-history'] = "site/stores/service_history";
$route['instamojo'] = "site/calls/instamojo";

$route['carwash-and-detailing'] = "site/user/carwash";
$route['general-service'] = "site/user/general_service";
$route['repairs'] = "site/user/repairs";
$route['breakdown-service'] = "site/user/break_service";
$route['denting-painting'] = "site/user/dentandpaint";

$route['booknow'] = "site/user/booknow";

$route['404_override'] = '';

$route['admin'] = "admin/adminlogin";










/* End of file routes.php */
/* Location: ./application/config/routes.php */