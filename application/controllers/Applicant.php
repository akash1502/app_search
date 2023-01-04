<?php
class Applicant extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->ERR_CODE = '';
		$this->ERR_DESCRIPTION = '';
		$this->SUC_CODE = '';
		$this->SUC_DESCRIPTION = '';
		$this->RES_LOGS = '';
		$this->RES_DATA = '';

	}

	//Akash
	public function upload_Documents($appid = '') {

		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				//get org applicant info
			}

			//echo "<br>permission--><pre>";	print_r($permission);	echo "</pre>";exit();

			$errorMsg = getErrorString($this->ERR_CODE, $this->ERR_DESCRIPTION);
			$data['errorMsg'] = $errorMsg;

			$data['permission'] = $permission;
			$data['org_appl_id'] = $appid;
			$data['main_content'] = 'org/org_upload_documents';

			$this->load->view('theme/template', $data);
		}
	}

	public function save_Org_Documents() {

		// echo "<pre>";
		// print_r($_POST);
		// print_r($_FILES);
		// echo "<pre>";

		$app_id = $_POST['app_id'];

		if (empty($app_id)) {

			$this->ERR_CODE = 1;
			$this->ERR_DESCRIPTION = 'Application Id is missing';

			$data = array('errr' => $this->ERR_CODE, 'msg' => $this->ERR_DESCRIPTION);
			echo json_encode($data);
			exit();
		}
		$is_success_flag = 1;

		$path = './assets/upload/org_documents/';

		$comp_reg_doc_1 = '';
		if (isset($_FILES["comp_reg_doc_1"]['name']) && !empty($_FILES["comp_reg_doc_1"]['name'])) {
			$comp_reg_doc_1 = $_FILES["comp_reg_doc_1"]['name'];
		}

		$comp_reg_doc_2 = '';
		if (isset($_FILES["comp_reg_doc_2"]['name']) && !empty($_FILES["comp_reg_doc_2"]['name'])) {
			$comp_reg_doc_2 = $_FILES["comp_reg_doc_2"]['name'];
		}

		if (empty($comp_reg_doc_1) && empty($comp_reg_doc_2)) {

			$this->ERR_CODE = 1;
			$this->ERR_DESCRIPTION = 'Please Upload company registered document -1 or document -2';

			$data = array('errr' => $this->ERR_CODE, 'msg' => $this->ERR_DESCRIPTION);
			echo json_encode($data);
			exit();
		}

		$Doc1_Upload_flag = 0;
		$Doc1_Level1 = 0;
		$Doc1_Level2 = 0;

		if (!empty($comp_reg_doc_1)) {

			$comp_reg_doc_1 = $app_id . "_doc_1.png";
			$uploaded_1 = $this->upload_files('comp_reg_doc_1', $comp_reg_doc_1, $path);

			if ($uploaded_1) {
				$is_success_flag = 0;
				$Doc1_Upload_flag = 1;
				$Doc1_Level1 = 1;
				$Doc1_Level2 = 1;
			}
		}
		$Doc2_Upload_falg = 0;
		$Doc2_Level1 = 0;
		$Doc2_Level2 = 0;
		if (!empty($comp_reg_doc_2)) {

			$comp_reg_doc_2 = $app_id . "_doc_2.png";
			$uploaded_2 = $this->upload_files('comp_reg_doc_2', $comp_reg_doc_2, $path);
			if ($uploaded_2) {
				$is_success_flag = 0;
				$Doc2_Upload_falg = 1;
				$Doc2_Level1 = 1;
				$Doc2_Level2 = 1;
			}

		}

		if ($is_success_flag == 1) {
			$data = array('errr' => 1, 'msg' => 'Something went to wrong please contact to admin');
			echo json_encode($data);
			exit();
		} else {

			$MSA_Uploaded = 0;
			$Status_Level1 = 'In queue';
			$Emp_ID_Level1 = '99';

			$Status_Level2 = 0;
			$MSA_Level2 = 0;
			$Emp_ID_Level2 = '';
			$Appln_status = 1;

			$Uploaded_path = '/assets/upload/org_documents/';

			$document_array = array(
				'Appln_ID' => $app_id,
				'Doc1_Upload' => $Doc1_Upload_flag,
				'Doc2_Upload' => $Doc2_Upload_falg,
				'MSA_Uploaded' => $MSA_Uploaded,
				'Doc1_Level1' => $Doc1_Level1,
				'Doc2_Level1' => $Doc2_Level1,
				'Status_Level1' => $Status_Level1,
				'Emp_ID_Level1' => $Emp_ID_Level1,
				'Status_Level2' => $Status_Level2,
				'Doc1_Level2' => $Doc1_Level2,
				'Doc2_Level2' => $Doc2_Level2,
				'MSA_Level2' => $MSA_Level2,
				'Emp_ID_Level2' => $Emp_ID_Level2,
				'Appln_status' => $Appln_status,
				'Doc1_File_name' => $comp_reg_doc_1,
				'Doc1_File_path' => $Uploaded_path,
				'Doc2_File_name' => $comp_reg_doc_2,
				'Doc2_File_path' => $Uploaded_path,
			);

			$itemList = array(
				'document_data' => array($document_array),
			);

			//echo "<pre>"; print_r($itemList); echo "</pre>";

			$post_document_data = json_encode($itemList);
			$called_api_resp = post_data('/save_uploaded_documents', $post_document_data);
			$json = json_decode($called_api_resp);
			// echo "<pre>"; print_r($json); echo "</pre>";

			if (isset($json->resp) && ($json->resp == 1)) {
				$data = array('errr' => 0, 'msg' => 'Document uploaded successfully');
			} else {
				$data = array('errr' => 0, 'msg' => 'Document uploaded successfully but record is not saved.Please contact to admin');
			}

			echo json_encode($data);
			exit();
		}
	}

	public function upload_files($name_id, $file_name, $path) {
		$config = array();
		$config['file_name'] = $file_name;
		$config['upload_path'] = $path;
		$config["overwrite"] = FALSE;
		$config['allowed_types'] = "gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
		$config['max_size'] = 2000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload($name_id)) {
			/*$error = array('error' => $this->upload->display_errors());
			print_r($error);*/
			return false;
		} else {
			return true;
		}
	}

	public function verify_app_emailId() {

		$Appln_ID = $_POST['app_id'];

		if (!empty($Appln_ID)) {

			$to = 'mailto:vivek@goodmove.cloud';
			$subject = 'App Verification Email';
			$message = 'Hi, my message!';
			$headers = 'From: mailto:akash.lokhande21@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=utf-8';
			if (mail($to, $subject, $message, $headers)) {

				$itemList = array(
					'app_data' => array(
						'Appln_ID' => $Appln_ID,
					),
				);

				//echo "<pre>"; print_r($itemList); echo "</pre>";

				$post_document_data = json_encode($itemList);

				$url = CALL_URL . "update_email_verification";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_document_data);
				$response = curl_exec($ch);
				curl_close($ch);

				// echo "<br>API server response ---> <pre>";
				// print_r($response);
				// echo "</pre>";

				$json = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);

				if (isset($json['resp']) && ($json['resp'] == 1)) {
					$data = array('errr' => 0, 'msg' => 'Email id verification successfully');
				} else {
					$data = array('errr' => 0, 'msg' => 'Email id verification failed.Please contact to admin');
				}

				echo json_encode($data);
				exit();
			} else {

				$data = array('errr' => 1, 'msg' => 'Email sending failed');
				echo json_encode($data);
				exit();
				//echo "Email sending failed";
			}

		} else {
			$data = array('errr' => 1, 'msg' => 'Application id required feild.Please send application id');
			echo json_encode($data);
			exit();
		}
	}

	public function verify_app_Website() {
		$website = $_POST['website'];

		$file = $website;
		$Appln_ID = $_POST['app_id'];

		if (!empty($Appln_ID)) {

			$file_headers = @get_headers($file);
			if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
				$data = array('errr' => 1, 'msg' => 'Currently website is not working state');
				echo json_encode($data);
				exit();
			} else {

				$itemList = array(
					'app_data' => array(
						'Appln_ID' => $Appln_ID,
					),
				);

				//echo "<pre>"; print_r($itemList); echo "</pre>";

				$post_document_data = json_encode($itemList);

				$url = CALL_URL . "verify_Website";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $post_document_data);
				$response = curl_exec($ch);
				curl_close($ch);

				// echo "<br>API server response ---> <pre>";
				// print_r($response);
				// echo "</pre>";

				$json = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true);

				if (isset($json['resp']) && ($json['resp'] == 1)) {
					$data = array('errr' => 0, 'msg' => 'Website verification successfully');
				} else {
					$data = array('errr' => 0, 'msg' => 'Website verification failed.Please contact to admin');
				}

				echo json_encode($data);
				exit();
			}

		} else {
			$data = array('errr' => 1, 'msg' => 'Application id required feild.Please send application id');
			echo json_encode($data);
			exit();
		}
	}

	//Gopal
	public function add_Applicant_In_Blacklist() {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'ADD_BLACKLIST') {

					if (isset($_POST['POST_ORGDATA']) && !empty($_POST['POST_ORGDATA'])) {
						$jsonPostData = $_POST['POST_ORGDATA'];
						$arrPostData = json_decode($jsonPostData, true);
						if (!empty($arrPostData)) {

							$sess_emp_id = $_SESSION['user']['Emp_ID'];
							$arrPostData['emp_level1_id'] = $sess_emp_id;
							$arrPostData['email_status'] = 2;
							$arrPostData['website_status'] = 2;

							//echo "<br>JsonArr--><pre>";	print_r($arrPostData);	echo "</pre>";
							$jsonPostData = json_encode($arrPostData);
							$fileOutput1 = post_data('/addApplicantBlackList', $jsonPostData);
							//echo "<br>FileOutput1-->" . $fileOutput1;
							$fileArry = json_decode($fileOutput1, true);
							if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {
								$this->ERR_CODE = $fileArry['ERR_CODE'];
								$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
								$this->SUC_CODE = $fileArry['SUC_CODE'];
								$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
								$this->RES_LOGS = $fileArry['RES_LOGS'];
								$this->RES_DATA = $fileArry['RES_DATA'];
							} else {
								$this->ERR_CODE = "API-REQUEST-FAIL";
								$this->ERR_DESCRIPTION = "Add blacklist request is failed.";
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

			} else {
				$this->ERR_CODE = "PERMISSION-ISSUE";
				$this->ERR_DESCRIPTION = $permission['statusMsg'];
			}
		} else {
			$this->ERR_CODE = "AUTH-ISSUE";
			$this->ERR_DESCRIPTION = "User  not logged in. Please Login in.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);

	}

	public function verify_Applicant_Level1_Emp2_Save() {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'VERIFY_LEVEL_2') {

					if (isset($_POST['POST_ORGDATA']) && !empty($_POST['POST_ORGDATA'])) {
						$jsonPostData = $_POST['POST_ORGDATA'];
						$arrPostData = json_decode($jsonPostData, true);
						if (!empty($arrPostData)) {

							$sess_emp_id = $_SESSION['user']['Emp_ID'];
							$arrPostData['emp_level2_id'] = $sess_emp_id;
							$arrPostData['appln_status'] = '3';
							$arrPostData['status_level2'] = '6';

							//echo "<br>JsonArr--><pre>";	print_r($arrPostData);	echo "</pre>";
							$jsonPostData = json_encode($arrPostData);
							$fileOutput1 = post_data('/verifyApplicantLevel1Emp2', $jsonPostData);
							//echo "<br>FileOutput1-->" . $fileOutput1;
							$fileArry = json_decode($fileOutput1, true);
							if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {
								$this->ERR_CODE = $fileArry['ERR_CODE'];
								$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
								$this->SUC_CODE = $fileArry['SUC_CODE'];
								$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
								$this->RES_LOGS = $fileArry['RES_LOGS'];
								$this->RES_DATA = $fileArry['RES_DATA'];
							} else {
								$this->ERR_CODE = "API-REQUEST-FAIL";
								$this->ERR_DESCRIPTION = "Verify process request is failed.";
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

				} elseif (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'VERIFY_LEVEL_2_REJECT') {

					if (isset($_POST['POST_ORGDATA']) && !empty($_POST['POST_ORGDATA'])) {
						$jsonPostData = $_POST['POST_ORGDATA'];
						$arrPostData = json_decode($jsonPostData, true);
						if (!empty($arrPostData)) {

							$sess_emp_id = $_SESSION['user']['Emp_ID'];
							$arrPostData['emp_level2_id'] = $sess_emp_id;
							$arrPostData['appln_status'] = '2';
							$arrPostData['status_level2'] = '5';

							//echo "<br>JsonArr--><pre>";	print_r($arrPostData);	echo "</pre>";
							$jsonPostData = json_encode($arrPostData);
							$fileOutput1 = post_data('/verifyApplicantLevel1Emp2', $jsonPostData);
							//echo "<br>FileOutput1-->" . $fileOutput1;
							$fileArry = json_decode($fileOutput1, true);
							if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {
								$this->ERR_CODE = $fileArry['ERR_CODE'];
								$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
								$this->SUC_CODE = $fileArry['SUC_CODE'];
								$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
								$this->RES_LOGS = $fileArry['RES_LOGS'];
								$this->RES_DATA = $fileArry['RES_DATA'];
							} else {
								$this->ERR_CODE = "API-REQUEST-FAIL";
								$this->ERR_DESCRIPTION = "Verify process request is failed.";
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

			} else {
				$this->ERR_CODE = "PERMISSION-ISSUE";
				$this->ERR_DESCRIPTION = $permission['statusMsg'];
			}
		} else {
			$this->ERR_CODE = "AUTH-ISSUE";
			$this->ERR_DESCRIPTION = "User  not logged in. Please Login in.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);
	}

	public function verify_Applicant_Level1_Emp2($appln_id = '') {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				if (!empty($appln_id)) {

					$applyStatusList = array('---' => 'Select Status', 3 => 'YES', 2 => 'NO');
					$fieldStatusList = array('---' => 'Select Status', 3 => 'YES', 2 => 'NO');

					$sess_emp_id = $_SESSION['user']['Emp_ID'];

					$data['applyStatusList'] = $applyStatusList;
					$data['fieldStatusList'] = $fieldStatusList;

					$url = "/getOrgApplicant/$appln_id";
					$jsonResp = get_data($url);

					if (!empty($jsonResp)) {
						$jsonArr = json_decode($jsonResp, true);
						if (isset($jsonArr['SUC_CODE'])) {

							$orgApplicant = $jsonArr['RES_DATA'];
							if (isset($orgApplicant['Appln_ID']) && !empty($orgApplicant['Appln_ID'])) {

								$appln_emp_id = $orgApplicant['Emp_ID_Level1'];
								//Verify the employee has assignet applicant
								if (!empty($appln_emp_id) && ($appln_emp_id == $sess_emp_id)) {
									$data['appln_id'] = $orgApplicant['Appln_ID'];
									$appln_contact = $orgApplicant['Appln_Phone_Code'] . '-' . $orgApplicant['Appln_Mobile_No'];

									$data['appln_contact'] = $appln_contact;
									$data['appln_email'] = $orgApplicant['Appln_Email_ID'];
									$data['appln_weburl'] = $orgApplicant['Org_Website_URL'];
									$data['orgApplicant'] = $orgApplicant;
								} else {
									$this->ERR_CODE = 'INVALID-DATA.';
									$this->ERR_DESCRIPTION = 'The requested Applicant is not assigned to you.';
								}

							} else {
								$this->ERR_CODE = $jsonArr['ERR_CODE'];
								$this->ERR_DESCRIPTION = $jsonArr['ERR_CODE'];
							}

						} else {
							$this->ERR_CODE = 'The received json response is invalid.';
							$this->ERR_DESCRIPTION = $jsonResp;
						}

					} else {
						$this->ERR_CODE = 'The received json response is empty.';
						$this->ERR_DESCRIPTION = $jsonResp;
					}

				} else {
					$this->ERR_CODE = 'MISSING-PARAM';
					$this->ERR_DESCRIPTION = 'The appln_id is required.';
				}

			}

			//echo "<br>permission--><pre>";	print_r($permission);	echo "</pre>";exit();

			$errorMsg = getErrorString($this->ERR_CODE, $this->ERR_DESCRIPTION);
			$data['errorMsg'] = $errorMsg;
			$data['permission'] = $permission;

			$data['main_content'] = 'org/org_applicant_verify_level_1_emp_2';
			$this->load->view('theme/template', $data);

		}
	}

	public function verify_Applicant_Level1_Emp1_Save() {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'VERIFY_LEVEL_1') {

					if (isset($_POST['POST_ORGDATA']) && !empty($_POST['POST_ORGDATA'])) {
						$jsonPostData = $_POST['POST_ORGDATA'];
						$arrPostData = json_decode($jsonPostData, true);
						if (!empty($arrPostData)) {

							$sess_emp_id = $_SESSION['user']['Emp_ID'];
							$arrPostData['emp_level1_id'] = $sess_emp_id;

							//echo "<br>JsonArr--><pre>";	print_r($arrPostData);	echo "</pre>";
							$jsonPostData = json_encode($arrPostData);
							$fileOutput1 = post_data('/verifyApplicantLevel1Emp1', $jsonPostData);
							//echo "<br>FileOutput1-->" . $fileOutput1;
							$fileArry = json_decode($fileOutput1, true);
							if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {
								$this->ERR_CODE = $fileArry['ERR_CODE'];
								$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
								$this->SUC_CODE = $fileArry['SUC_CODE'];
								$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
								$this->RES_LOGS = $fileArry['RES_LOGS'];
								$this->RES_DATA = $fileArry['RES_DATA'];
							} else {
								$this->ERR_CODE = "API-REQUEST-FAIL";
								$this->ERR_DESCRIPTION = "Verify process request is failed.";
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

			} else {
				$this->ERR_CODE = "PERMISSION-ISSUE";
				$this->ERR_DESCRIPTION = $permission['statusMsg'];
			}
		} else {
			$this->ERR_CODE = "AUTH-ISSUE";
			$this->ERR_DESCRIPTION = "User  not logged in. Please Login in.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);
	}

	public function verify_Applicant_Level1_Emp1($appln_id = '') {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				if (!empty($appln_id)) {

					$applyStatusList = array('---' => 'Select Status', 3 => 'YES', 2 => 'NO');
					$fieldStatusList = array('---' => 'Select Status', 3 => 'YES', 2 => 'NO');

					$sess_emp_id = $_SESSION['user']['Emp_ID'];

					$data['applyStatusList'] = $applyStatusList;
					$data['fieldStatusList'] = $fieldStatusList;

					$url = "/getOrgApplicant/$appln_id";
					$jsonResp = get_data($url);

					if (!empty($jsonResp)) {
						$jsonArr = json_decode($jsonResp, true);
						if (isset($jsonArr['SUC_CODE'])) {

							$orgApplicant = $jsonArr['RES_DATA'];
							if (isset($orgApplicant['Appln_ID']) && !empty($orgApplicant['Appln_ID'])) {

								$appln_emp_id = $orgApplicant['Emp_ID_Level1'];
								//Verify the employee has assignet applicant
								if (!empty($appln_emp_id) && ($appln_emp_id == $sess_emp_id)) {
									$data['appln_id'] = $orgApplicant['Appln_ID'];
									$appln_contact = $orgApplicant['Appln_Phone_Code'] . '-' . $orgApplicant['Appln_Mobile_No'];

									$data['appln_contact'] = $appln_contact;
									$data['appln_email'] = $orgApplicant['Appln_Email_ID'];
									$data['appln_weburl'] = $orgApplicant['Org_Website_URL'];
									$data['orgApplicant'] = $orgApplicant;
								} else {
									$this->ERR_CODE = 'INVALID-DATA.';
									$this->ERR_DESCRIPTION = 'The requested Applicant is not assigned to you.';
								}

							} else {
								$this->ERR_CODE = $jsonArr['ERR_CODE'];
								$this->ERR_DESCRIPTION = $jsonArr['ERR_CODE'];
							}

						} else {
							$this->ERR_CODE = 'The received json response is invalid.';
							$this->ERR_DESCRIPTION = $jsonResp;
						}

					} else {
						$this->ERR_CODE = 'The received json response is empty.';
						$this->ERR_DESCRIPTION = $jsonResp;
					}

				} else {
					$this->ERR_CODE = 'MISSING-PARAM';
					$this->ERR_DESCRIPTION = 'The appln_id is required.';
				}

			}

			//echo "<br>permission--><pre>";	print_r($permission);	echo "</pre>";exit();

			$errorMsg = getErrorString($this->ERR_CODE, $this->ERR_DESCRIPTION);
			$data['errorMsg'] = $errorMsg;
			$data['permission'] = $permission;

			$data['main_content'] = 'org/org_applicant_verify_level_1_emp_1';
			$this->load->view('theme/template', $data);

		}
	}

	public function assign_Employee_To_Applicant() {
		if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'ASSIGN_APPLN') {

			if (isset($_POST['POST_ORGDATA']) && !empty($_POST['POST_ORGDATA'])) {
				$jsonPostData = $_POST['POST_ORGDATA'];
				$arrPostData = json_decode($jsonPostData, true);
				if (!empty($arrPostData)) {

					//verify the user/employee is logged in
					//collect the emp id from session
					$user = $this->session->userdata('user');
					$empID = $user['Emp_ID'];
					$arrPostData['emp_id'] = $empID;

					//echo "<br>JsonArr--><pre>";	print_r($arrPostData);echo "</pre>";exit();

					$jsonPostData = json_encode($arrPostData);
					$fileOutput1 = post_data('/assignOrgAppln', $jsonPostData);
					//echo "<br>FileOutput1-->" . $fileOutput1;
					$fileArry = json_decode($fileOutput1, true);
					if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {
						$this->ERR_CODE = $fileArry['ERR_CODE'];
						$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
						$this->SUC_CODE = $fileArry['SUC_CODE'];
						$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
						$this->RES_LOGS = $fileArry['RES_LOGS'];
						$this->RES_DATA = $fileArry['RES_DATA'];
					} else {
						$this->ERR_CODE = "API-REQUEST-FAIL";
						$this->ERR_DESCRIPTION = "Org assigne request is failed.";
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

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);
	}

	public function save_Applicant_Request() {
		if (isset($_POST['ACTION']) && !empty($_POST['ACTION']) && $_POST['ACTION'] == 'SAVE_APP_REQUEST') {

			if (isset($_POST['POST_ORGDATA']) && !empty($_POST['POST_ORGDATA'])) {
				$jsonPostData = $_POST['POST_ORGDATA'];
				$arrPostData = json_decode($jsonPostData, true);
				if (!empty($arrPostData)) {

					//echo "<br>JsonArr--><pre>";	print_r($arrPostData);	echo "</pre>";
					$fileOutput1 = post_data('/saveApplyOrg', $jsonPostData);
					//echo "<br>FileOutput1-->" . $fileOutput1;
					$fileArry = json_decode($fileOutput1, true);
					if (isset($fileArry['ERR_CODE']) && isset($fileArry['SUC_CODE'])) {
						$this->ERR_CODE = $fileArry['ERR_CODE'];
						$this->ERR_DESCRIPTION = $fileArry['ERR_DESCRIPTION'];
						$this->SUC_CODE = $fileArry['SUC_CODE'];
						$this->SUC_DESCRIPTION = $fileArry['SUC_DESCRIPTION'];
						$this->RES_LOGS = $fileArry['RES_LOGS'];
						$this->RES_DATA = $fileArry['RES_DATA'];
					} else {
						$this->ERR_CODE = "API-REQUEST-FAIL";
						$this->ERR_DESCRIPTION = "Org save request is failed.";
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

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);
	}

	public function get_Level2_Applicant_List() {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {

				//collect the emp id from session
				$user = $this->session->userdata('user');
				$empID = $user['Emp_ID'];

				$url = "/getOrgApplList";
				$jsonResp = get_data($url);

				if (!empty($jsonResp)) {
					$jsonArr = json_decode($jsonResp);
					if (isset($jsonArr->SUC_CODE) && ($jsonArr->SUC_CODE == 'SUCCESS')) {
						$orgData = $jsonArr->RES_DATA;

						$resultOrgData = array();
						foreach ($orgData as $a) {
							if ($a->Emp_ID_Level1 == $empID || $a->Appln_status == 0) {
								$resultOrgData[] = $a;
							}
						}

						$data['orgData'] = $resultOrgData;

					} else {
						$this->ERR_CODE = 'The received json response is invalid.';
						$this->ERR_DESCRIPTION = $jsonResp;
					}

				} else {
					$this->ERR_CODE = 'The received json response is empty.';
					$this->ERR_DESCRIPTION = $jsonResp;
				}

				$errorMsg = getErrorString($this->ERR_CODE, $this->ERR_DESCRIPTION);
				$data['errorMsg'] = $errorMsg;
			}

			//echo "<br>permission--><pre>";	print_r($permission);	echo "</pre>";exit();

			$data['permission'] = $permission;
			$data['main_content'] = 'org/org_applicant_Level_2_list';
			$this->load->view('theme/template', $data);

		}
	}

	public function get_Level1_Applicant_List() {

		//verify the user is logged in.
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {

				//collect the emp id from session
				$user = $this->session->userdata('user');
				$empID = $user['Emp_ID'];

				$url = "/getOrgApplList";
				$jsonResp = get_data($url);

				if (!empty($jsonResp)) {
					$jsonArr = json_decode($jsonResp);
					if (isset($jsonArr->SUC_CODE) && ($jsonArr->SUC_CODE == 'SUCCESS')) {
						$orgData = $jsonArr->RES_DATA;

						$resultOrgData = array();
						foreach ($orgData as $a) {
							if ($a->Emp_ID_Level1 == $empID || $a->Appln_status == 0) {
								$resultOrgData[] = $a;
							}
						}

						$data['orgData'] = $resultOrgData;

					} else {
						$this->ERR_CODE = 'The received json response is invalid.';
						$this->ERR_DESCRIPTION = $jsonResp;
					}

				} else {
					$this->ERR_CODE = 'The received json response is empty.';
					$this->ERR_DESCRIPTION = $jsonResp;
				}

				$errorMsg = getErrorString($this->ERR_CODE, $this->ERR_DESCRIPTION);
				$data['errorMsg'] = $errorMsg;
			}

			//echo "<br>permission--><pre>";	print_r($permission);	echo "</pre>";exit();

			$data['permission'] = $permission;
			$data['main_content'] = 'org/org_applicant_Level_1_list';
			$this->load->view('theme/template', $data);

		}
	}

	public function signup_Applicant() {

		//$this->load->model('AdminActivity_model');

		$ip_address = '';
		$mac_id = '';

		if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip_address = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$ip_address = $_SERVER['REMOTE_ADDR'];
		}

		//$macCommandString = "arp " . $ip_address . " | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";
		//$mac_id = exec($macCommandString);

		//$ip_address = '';

		$data['ip_address'] = $ip_address;
		$data['mac_id'] = $mac_id;

		//exclude session and permission
		$data['excludeNavigation'] = 'YES';
		$permission['statusFlag'] = true;
		$data['permission'] = $permission;

		$data['main_content'] = 'org/org_applicant_signup';
		$this->load->view('theme/template', $data);
	}

	public function verify_Website_Url() {
		if (isset($_GET['urlString']) && !empty($_GET['urlString'])) {

			$urlString = $_GET['urlString'];
			$urlString = urldecode($urlString);
			//echo "<br>Url-->$urlString <br>";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $urlString);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
			$result = curl_exec($ch);

			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

			//echo "<br>Httpcode -->$httpcode <br>";
			//echo "<br>Result -->$result <br>";

			if ($httpcode == 200 || $httpcode == 204) {
				$this->SUC_CODE = 'SUCCESS';
				$this->SUC_DESCRIPTION = "This is valid url.";
			} else {
				$this->ERR_CODE = 'INVALIID-URL';
				$this->ERR_DESCRIPTION = "Provided url does not exsits.";
			}

		} else {
			$this->ERR_CODE = 'INVALIID-URL';
			$this->ERR_DESCRIPTION = "Please enter url.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);
	}

	public function go_Website_Url($urlString = '') {
		if (!empty($_GET['urlString'])) {
			$urlString = $_GET['urlString'];
			echo "<h3>Redirecting to ...$urlString</h3>";
			redirect($urlString);
			sleep(3);
		} else {
			$this->ERR_CODE = 'INVALIID-URL';
			$this->ERR_DESCRIPTION = "Please enter url.";
		}

		$jsonArr = array(
			'ERR_CODE' => $this->ERR_CODE,
			'ERR_DESCRIPTION' => $this->ERR_DESCRIPTION,
			'SUC_CODE' => $this->SUC_CODE,
			'SUC_DESCRIPTION' => $this->SUC_DESCRIPTION,
			'RES_LOGS' => $this->RES_LOGS,
			'RES_DATA' => $this->RES_DATA,
		);

		//echo "<br>JsonArr--><pre>"; print_r($jsonArr); echo "</pre>";
		echo json_encode($jsonArr);
	}

	//Akash
	public function verify_Applicant_L2_Doc($appln_id = ''){
		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			$permission = verifyUserPermissionError(104);

			if (isset($permission['statusFlag']) && ($permission['statusFlag'] == true)) {
				if (!empty($appln_id)) {

					$applyStatusList = array('---' => 'Select Status', 3 => 'YES', 2 => 'NO');
					$fieldStatusList = array('---' => 'Select Status', 3 => 'YES', 2 => 'NO');

					$sess_emp_id = $_SESSION['user']['Emp_ID'];

					$data['applyStatusList'] = $applyStatusList;
					$data['fieldStatusList'] = $fieldStatusList;

					$url = "/getApplicantDocs/$appln_id";
					$jsonResp = get_data($url);

					if (!empty($jsonResp)) {
						$jsonArr = json_decode($jsonResp, true);
						if (isset($jsonArr['SUC_CODE'])) {	

							//echo "<pre>";print_r($jsonArr); echo "</pre>";die;

							$orgApplicant = $jsonArr['RES_DATA'];
							if (isset($orgApplicant['Appln_ID']) && !empty($orgApplicant['Appln_ID'])) {

								$appln_emp_id = $orgApplicant['Emp_ID_Level1'];
								$data['orgApplicantData'] = $orgApplicant;
								//Verify the employee has assignet applicant
			

							} else {
								$this->ERR_CODE = $jsonArr['ERR_CODE'];
								$this->ERR_DESCRIPTION = $jsonArr['ERR_CODE'];
							}

						} else {
							$this->ERR_CODE = 'The received json response is invalid.';
							$this->ERR_DESCRIPTION = $jsonResp;
						}

					} else {
						$this->ERR_CODE = 'The received json response is empty.';
						$this->ERR_DESCRIPTION = $jsonResp;
					}

				} else {
					$this->ERR_CODE = 'MISSING-PARAM';
					$this->ERR_DESCRIPTION = 'The appln_id is required.';
				}

			}

			//echo "<br>permission--><pre>";	print_r($permission);	echo "</pre>";exit();

			$errorMsg = getErrorString($this->ERR_CODE, $this->ERR_DESCRIPTION);
			$data['errorMsg'] = $errorMsg;

			$data['permission'] = $permission;
			$data['org_appl_id'] = $appln_id;
			$data['main_content'] = 'org/verify_Applicant_L2_Doc';

			$this->load->view('theme/template', $data);
		}
	}

	public function save_Verify_Documents(){
		//echo "<pre>"; print_r($_POST); echo "<pre>";
	
		$app_id = $_POST['Appln_ID'];

		if (empty($app_id)) {

			$this->ERR_CODE = 1;
			$this->ERR_DESCRIPTION = 'Application Id is missing';

			$data = array('errr' => $this->ERR_CODE, 'msg' => $this->ERR_DESCRIPTION);
			echo json_encode($data);
			exit();
		}

		$org_regId =$_POST['org_regId'];
		$pan_no =$_POST['pan_no'];
		$GST_no ='';
		if(isset($_POST['GST_no']) && !empty($_POST['GST_no'])){
			$GST_no =$_POST['GST_no'];
		}

		$add_1 =$_POST['add_1'];
		$add_2 ='';
		if(isset($_POST['add_2']) && !empty($_POST['add_2'])){
			$add_2 =$_POST['add_2'];
		}

		$add_3 ='';
		if(isset($_POST['add_3']) && !empty($_POST['add_3'])){
			$add_3 =$_POST['add_3'];
		}
		$area =$_POST['area'];
		$area =$_POST['area'];
		$city =$_POST['city'];
		$country =$_POST['country'];

		$sess_emp_id = $_SESSION['user']['Emp_ID'];
		$date_created =date("Y-m-d H:i:s");

		$verify_array = array(
				'Appln_ID' => $app_id,
				'org_regId' => $org_regId,
				'pan_no' => $pan_no,
				'GST_no' => $GST_no,
				'add_1' => $add_1,
				'add_2' => $add_2,
				'add_3' => $add_3,
				'area' => $area,
				'city' => $city,
				'country' => $country,
				'emp_id' => $sess_emp_id,
				'date_created' => $date_created,
			);

		$json_data = array(
			'data' => array($verify_array),
		);

		//echo "<pre>"; print_r($json_data); echo "</pre>";

		$post_value = json_encode($json_data);
		$called_api_resp = post_data('/savedToApiVerifyDocuments', $post_value);
		$json = json_decode($called_api_resp);
		echo "<pre>"; print_r($json); echo "</pre>";

		// if (isset($json->resp) && ($json->resp == 1)) {
		// 	$data = array('errr' => 0, 'msg' => 'Document uploaded successfully');
		// } else {
		// 	$data = array('errr' => 0, 'msg' => 'Document uploaded successfully but record is not saved.Please contact to admin');
		// }

		// echo json_encode($data);
		// exit();
	}

}
