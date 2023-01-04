<?php
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->ERR_CODE = '';
		$this->ERR_DESCRIPTION = '';
		$this->SUC_CODE = '';
		$this->SUC_DESCRIPTION = '';
		$this->RES_LOGS = '';
		$this->RES_DATA = '';
	}

	public function submit_user_role() {

		//echo "<pre>";print_r($_POST);echo "</pre>";exit();
		if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'SELECT_ROLE_REQUEST') {

			if (isset($_POST['POST_SELROLEDATA']) && !empty($_POST['POST_SELROLEDATA'])) {
				$jsonPostData = $_POST['POST_SELROLEDATA'];
				$arrPostData = json_decode($jsonPostData, true);
				if (!empty($arrPostData)) {

					// echo "<pre>";print_r($arrPostData);echo "</pre>";
					//echo "<pre>";print_r($_SESSION);echo "</pre>";//exit();

					$user_role_id = $arrPostData['user_role_id'];
					$users = $this->session->userdata('users');

					if (isset($users) && !empty($users)) {

						foreach ($users as $key => $user) {

							$org_id = $user['Org_ID'];
							$user_id = $user['Emp_ID'];
							$user_role = $user['user_role'];

							if (!empty($user_role)) {
								foreach ($user_role as $key => $role) {

									$roleid = $role['Role_ID'];
									$rolename = $role['Role_Descr'];
									$keyid = $user_id . "_" . $roleid;

									if ($user_role_id == $keyid) {

										$getPermission = "";
										//get permission using with role id
										//$getPermission = $this->Login_model->getPermissionByRoleId($roleid);

										$url = "/getRolePermission?role_id=" . $roleid . "&emp_id=" . $user_id . "&org_id=" . $org_id;
										$jsonResp = get_data($url);
										//var_dump($jsonResp);exit();
										if (!empty($jsonResp)) {
											$jsonArr = json_decode($jsonResp, true);
											if (isset($jsonArr['SUC_CODE']) && ($jsonArr['SUC_CODE'] == 'SUCCESS')) {
												$getPermission = $jsonArr['RES_DATA'];
											}
										}

										$data = array(
											'user' => $user,
											'user_role_per' => $getPermission,
											'is_logged_in' => true,
										);

										$this->session->set_userdata($data);
										$this->session->unset_userdata('users');

										$this->SUC_CODE = "SUCCESS";
										$this->SUC_DESCRIPTION = "Activity completed successfully.";
										break;
									}
								}
							}
						}
					}
					//echo "<pre>"; print_r($_SESSION);echo "</pre>";exit();

				} else {
					$this->ERR_CODE = "MISSING-PARAM";
					$this->ERR_DESCRIPTION = "Invalid Json data request.";
				}

			} else {
				$this->ERR_CODE = "MISSING-PARAM";
				$this->ERR_DESCRIPTION = "Json data request required.";
			}

		} else {
			$this->ERR_CODE = "INVALID-REQUEST";
			$this->ERR_DESCRIPTION = "This is unsported request to handle this controller.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";exit();
		echo json_encode($jsonArr);
	}

	public function select_user_role() {
		$users = $this->session->userdata('users');
		$userArr = array();
		if (isset($users) && !empty($users)) {
			foreach ($users as $key => $user) {
				$OrgName = $user['Org_Name'];
				$user_id = $user['Emp_ID'];
				$user_role = $user['user_role'];

				if (!empty($user_role)) {
					foreach ($user_role as $key => $role) {
						$tempArr = array();
						$roleid = $role['Role_ID'];
						$rolename = $role['Role_Descr'];
						$keyid = $user_id . "_" . $roleid;

						$tempArr['user_id'] = $user_id;
						$tempArr['orgname'] = $OrgName;
						$tempArr['roleid'] = $roleid;
						$tempArr['rolename'] = $rolename;
						$tempArr['keyid'] = $keyid;

						$userArr[] = $tempArr;
					}
				}
			}

			$data['session_users'] = $userArr;

		} else {
			$data['errorMsg'] = "Does not found user data in session";
		}

		//exclude session and permission
		$data['excludeNavigation'] = 'YES';
		$permission['statusFlag'] = true;
		$data['permission'] = $permission;

		$data['main_content'] = 'login/select_roles_page';
		$this->load->view('theme/template', $data);
	}

	public function app_Logout() {
		$this->session->sess_destroy();
		redirect('/');
	}

	public function verify_Login_User() {

		//echo "<pre>";print_r($_POST);echo "</pre>";exit();
		if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'LOGIN_REQUEST') {

			if (isset($_POST['POST_LOGINDATA']) && !empty($_POST['POST_LOGINDATA'])) {
				$jsonPostData = $_POST['POST_LOGINDATA'];
				$arrPostData = json_decode($jsonPostData, true);
				if (!empty($arrPostData)) {

					//Collecting user data from data using REST API
					$url = "/verifyUserLogin";
					$fileOutput1 = post_data($url, $jsonPostData);

					$fileArry = json_decode($fileOutput1, true);
					if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {

						if (($fileArry['SUC_CODE'] == "SUCCESS") && isset($fileArry['RES_DATA']) && !empty($fileArry['RES_DATA'])) {

							//Set all user Variable into session

							$data = array(
								'users' => $fileArry['RES_DATA'],
								'is_logged_in' => false,
							);
							$this->session->set_userdata($data);
							// echo '<pre>'; var_dump($_SESSION);echo "</pre>";
							// exit();

						}
						$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
						$this->SUC_CODE = $fileArry['SUC_CODE'];
						$this->ERR_CODE = $fileArry['ERR_CODE'];
						$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
						$this->RES_LOGS = $fileArry['RES_LOGS'];

					} else {
						$this->ERR_CODE = "API-REQUEST-FAIL";
						$this->ERR_DESCRIPTION = "User Login attempt failed.";
						$this->RES_LOGS = $fileOutput1;
					}

				} else {
					$this->ERR_CODE = "MISSING-PARAM";
					$this->ERR_DESCRIPTION = "Invalid Json data request.";
				}

			} else {
				$this->ERR_CODE = "MISSING-PARAM";
				$this->ERR_DESCRIPTION = "Json data request required.";
			}

		} else {
			$this->ERR_CODE = "INVALID-REQUEST";
			$this->ERR_DESCRIPTION = "This is unsported request to handle this controller.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";exit();
		echo json_encode($jsonArr);
	}

	public function app_Login() {
		$this->load->view('login/login_page');
	}
}
