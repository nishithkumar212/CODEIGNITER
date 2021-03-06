<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
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
$route['default_controller'] = 'Welcome';
$route['findall']='Mycontroller/findall';
$route['findid/(:num)']='Mycontroller/find/$1';
$route['create']='Mycontroller/create';
$route['update']='Mycontroller/update';
$route['delete/(:num)']='Mycontroller/delete/$1';
$route['register']='Signin/insertion';

// $route['register']='RegistrationDoctrine/setregistrationdata';


$route['login']='Login/login';
$route['forgot']='Forgotpassword/forgot';
$route['reset']='Resetpassword/reset';
$route['note']='Note/noteregister';
$route['notes']='Note/labeldatainsertion';
$route['selected']='selected/calling';
$route['selectedlabel']='Labels/selectlabel';
$route['fetchemails']='Resetpassword/getemail';
$route['404_override'] = '';
$route['noteedit']='Editnotes/edit';
$route['deletenote']='Deletenote/deleted';
$route['setcolor']='Editnotes/coloring';
$route['reminder']='Reminder/setreminder';
$route['reminders']='Reminder/insertreminder';
$route['archive']='Archive/setarchive';
$route['unarchive']='Archive/unarchive';
$route['archivedisplay']='Archive/setarchivedisplay';
$route['createlabel']='Labels/createlabel';
$route['getlabel']='Labels/selectlabel';
$route['translate_uri_dashes'] = FALSE;
$route['selectiondelete']='Deletenote/selection';
$route['sociallogindata']='Login/signin';

$route['imageinsertion']='Login/imageinsertion';
$route['imageinsertionnote']='Login/imageinsertionnote';
$route['imageselection']='selected/imageselection';
$route['searchdata']='Editnotes/searching';
$route['childlabel']= 'Childlabel/label';
$route['updatelabelnotes']='Updatelabelnote/update';
$route['deletelabel']='Updatelabelnote/deletelabel';
$route['addlabel']='Updatelabelnote/addlabel';
$route['setdata']='Doctrineuser/setter';
$route['setregister']='RegistrationDoctrine/setregistrationdata';
$route['renamelabel']='Labels/renamelabel';
$route['deleteredis']='Note/deleteredis';
$route['dragging']='Note/dragging';