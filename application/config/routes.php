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

$route['default_controller'] = "site";
$route['404_override'] = '';
$route['login'] = 'site/login';
$route['logout'] = 'site/logout';
$route['cheat'] = 'site/cheat';
$route['(:num)'] = 'site';
$route['(:num)/(:num)'] = 'site';
$route['(:num)/page/(:num)'] = 'site';
$route['calendar/(:num)'] = 'calendar';
$route['calendar/(:num)/(:num)'] = 'calendar';
$route['calendar/(:num)/page/(:num)'] = 'calendar';
$route['calendar/page'] = 'calendar';
$route['calendar/page/(:num)'] = 'calendar';
$route['calendar/page/(:num)/(:any)'] = 'calendar';
$route['helpline/page'] = 'helpline';
$route['helpline/page/(:num)'] = 'helpline';
$route['helpline/page/(:num)/(:any)'] = 'helpline';
$route['labor/page'] = 'labor';
$route['labor/page/(:num)'] = 'labor';
$route['labor/page/(:num)/(:any)'] = 'labor';
$route['travel/page'] = 'travel';
$route['travel/page/(:num)'] = 'travel';
$route['travel/page/(:num)/(:any)'] = 'travel';
$route['timeoff/page'] = 'timeoff';
$route['timeoff/page/(:num)'] = 'timeoff';
$route['timeoff/page/(:num)/(:any)'] = 'timeoff';
$route['timesheet/page'] = 'timesheet';
$route['timesheet/page/(:num)'] = 'timesheet';
$route['timesheet/page/(:num)/(:any)'] = 'timesheet';
$route['procurement/page'] = 'procurement';
$route['procurement/page/(:num)'] = 'procurement';
$route['procurement/page/(:num)/(:any)'] = 'procurement';
$route['budget/(:num)'] = 'budget';
$route['budget/page'] = 'budget';
$route['budget/page/(:num)'] = 'budget';
$route['budget/page/(:num)/(:any)'] = 'budget';
$route['volunteers/page'] = 'volunteers';
$route['volunteers/page/(:num)'] = 'volunteers';
$route['volunteers/page/(:num)/(:any)'] = 'volunteers';


$route['lasermetrics/(:any)/new'] = 'lasermetrics/$1';
$route['lasermetrics/(:any)/edit/(:num)'] = 'lasermetrics/$1/$2';
$route['lasermetrics/(:any)/page'] = 'lasermetrics/$1';
$route['lasermetrics/(:any)/page/(:num)'] = 'lasermetrics/$1';
$route['lasermetrics/(:any)/page/(:num)/(:any)'] = 'lasermetrics/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */