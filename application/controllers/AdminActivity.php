<?php
class AdminActivity extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}

	public function add_altAdmin() {

		$data['main_content'] = '/admin/add_Admin';
		$this->load->view('theme/template', $data);

	}

	public function tranfer_pointsBetweenDepartment() {

		$data['main_content'] = '/admin/transfer_points_between_dept';
		$this->load->view('theme/template', $data);
	}

	public function tranfer_pointsBetweenLocation() {

		$data['main_content'] = '/admin/transfer_points_between_loc';
		$this->load->view('theme/template', $data);
	}

	public function add_department() {

		$data['main_content'] = '/admin/add_department';
		$this->load->view('theme/template', $data);
	}

	public function add_location() {

		$data['main_content'] = '/admin/add_location';
		$this->load->view('theme/template', $data);
	}

	public function add_user() {

		$data['main_content'] = '/admin/add_user';
		$this->load->view('theme/template', $data);
	}

	public function add_new_department() {

		$data['main_content'] = '/admin/add_new_department';
		$this->load->view('theme/template', $data);
	}

	public function country_StateCity() {

		$this->load->model('AdminActivity_model');

		$data['countryResult'] = $this->AdminActivity_model->getAllCountry();

		$data['main_content'] = 'admin/country_state_city';
		$this->load->view('theme/template', $data);
	}

}
