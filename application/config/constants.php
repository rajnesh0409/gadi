<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');



/* Our own table prefix start */
define('TBL_PREF',						'hp_');
define('ADMIN',				TBL_PREF.'admin');
define('ADMIN_SETTINGS',	TBL_PREF.'admin_settings');
define('USERS',				TBL_PREF.'users');
define('CMS',				TBL_PREF.'cms');
define('NEWSLETTER',		TBL_PREF.'newsletter');
define('HOTEL_DETAILS',		TBL_PREF.'hotel_details');
define('BECOME_PARTNER',    TBL_PREF.'become_partner');
define('BRANDS',            TBL_PREF.'brands');
define('VEHICLE_MODELS',    TBL_PREF.'vehicle_models');
define('SERVICE_PARTNERS',    TBL_PREF.'service_partners');
define('SERVICES',    TBL_PREF.'services');
define('ADD_REPAIRS',    TBL_PREF.'additional_repairs');
define('CATS',    TBL_PREF.'categories');
define('SERVICE_PRICE',    TBL_PREF.'service_price');
define('SERVICE_STORES',    TBL_PREF.'stores');
define('VEHICLES',    TBL_PREF.'vehicles');
define('BOOKDETAILS',    TBL_PREF.'booking_details');
define('PAYMENTS',    TBL_PREF.'payments');
define('FEEDBACK',    TBL_PREF.'feedback');
define('PROMOS',    TBL_PREF.'promos');
define('TESTIMONIALS',    TBL_PREF.'testimonials');
define('DELIVERY_BOY',    TBL_PREF.'delivery_boy');


// basic routes for frontend
define('FULLURL','http://localhost/hoopy/site/');
define('SHORTURL','http://localhost/hoopy/');


/* End of file constants.php */
/* Location: ./application/config/constants.php */