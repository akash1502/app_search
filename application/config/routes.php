<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'Login/app_login';
$route['app_login'] = 'Login/app_Login';
$route['appLogin'] = 'Login/app_Login';
$route['appLogout'] = 'Login/app_Logout';

//Gopal
$route['verifyLoginUser'] = 'Login/verify_Login_User';
$route['selectUserRole'] = 'Login/select_user_role';
$route['submitUserRole'] = 'Login/submit_user_role';

$route['getDashBoard'] = 'dashboard/get_DashBoard';

$route['signupApplicant'] = 'Applicant/signup_Applicant';
$route['verifyWebsiteUrl'] = 'Applicant/verify_Website_Url';
$route['goWebsiteUrl'] = 'Applicant/go_Website_Url';
$route['saveApplicantRequest'] = 'Applicant/save_Applicant_Request';
$route['getLevel1ApplicantList'] = 'Applicant/get_Level1_Applicant_List';
$route['getLevel2ApplicantList'] = 'Applicant/get_Level2_Applicant_List';
$route['assignEmployeeToApplicant'] = 'Applicant/assign_Employee_To_Applicant';
$route['verifyApplicantL1E1/(:num)'] = 'Applicant/verify_Applicant_Level1_Emp1/$1';
$route['verifyApplicantLevel1Emp1Save'] = 'Applicant/verify_Applicant_Level1_Emp1_Save';
$route['verifyApplicantL1E2/(:num)'] = 'Applicant/verify_Applicant_Level1_Emp2/$1';
$route['verifyApplicantLevel1Emp2Save'] = 'Applicant/verify_Applicant_Level1_Emp2_Save';
$route['addApplicantInBlacklist'] = 'Applicant/add_Applicant_In_Blacklist';

//Akash
$route['uploadDocuments/(:num)'] = 'Applicant/upload_Documents/$1';
$route['saveOrgDocuments'] = 'Applicant/save_Org_Documents';

$route['ref_countryCodes'] = 'Appapi/ref_countryCodes';
$route['verifyApplicantL2Doc/(:num)'] = 'Applicant/verify_Applicant_L2_Doc/$1';

$route['saveVerifyDocuments'] = 'Applicant/save_Verify_Documents';


//These are old poc works
$route['company_registration'] = 'Login/company_registration';
$route['get_countryList'] = 'Appapi/get_countryList';
$route['get_stateList'] = 'Appapi/get_stateList';
$route['get_cityList'] = 'Appapi/get_cityList';
$route['get_DepartmentList'] = 'Appapi/get_DepartmentList';

$route['submit_companyRegistration'] = 'Login/submit_companyRegistration';

$route['candidate_list'] = 'dashboard/candidate_list';
$route['company_approvalList'] = 'dashboard/company_approvalList';
$route['show_companyDetails'] = 'dashboard/show_companyDetails';

$route['add_Alt_Admin'] = 'AdminActivity/add_altAdmin';
$route['add_Department'] = 'AdminActivity/add_department';
$route['add_Location'] = 'AdminActivity/add_location';
$route['add_new_department'] = 'AdminActivity/add_new_department';
$route['add_User'] = 'AdminActivity/add_User';

$route['tranfer_points_dept_to_dept'] = 'AdminActivity/tranfer_pointsBetweenDepartment';
$route['tranfer_points_loc_to_loc'] = 'AdminActivity/tranfer_pointsBetweenLocation';
$route['tranfer_points_pool_to_dept'] = 'AdminActivity/tranfer_poolPointsToDepartment';
$route['tranfer_points_dept_to_pool'] = 'AdminActivity/tranfer_departmentPointsToPool';

$route['get_Location'] = 'Appapi/get_Location';
$route['performCacheKeyValueOperations'] = 'login/performCacheKeyValueOperations';