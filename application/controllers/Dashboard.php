<?php
class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->ERR_CODE = '';
		$this->ERR_DESCRIPTION = '';
		$this->SUC_CODE = '';
		$this->SUC_DESCRIPTION = '';
		$this->RES_LOGS = '';
		$this->RES_DATA = '';

		$this->load->helpers('App_helper');

	}

	public function get_DashBoard() {

		$verifySessionUser = verifySessionUser();
		if ($verifySessionUser) {
			//echo "<pre>"; print_r($_SESSION);	echo "</pre>";exit();

			$permission['statusFlag'] = true;

			//exclude session and permission
			$permission['statusFlag'] = true;
			$data['permission'] = $permission;

			$data['main_content'] = '/public/dashboard';
			$this->load->view('theme/template', $data);
		}

	}

	public function candidate_list() {

		$data['main_content'] = '/admin/candidate_list';
		$this->load->view('theme/template', $data);
	}

	public function company_approvalList() {

		$data['main_content'] = '/admin/company_approvalList';
		$this->load->view('theme/template', $data);

	}
	public function show_companyDetails() {

		$data['main_content'] = '/admin/show_companyDetails';
		$this->load->view('theme/template', $data);
	}

}
