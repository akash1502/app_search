<?php
class Appapi extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}

	public function ref_countryCodes() {

		$searchText = $this->input->get('searchText');
		//clearCache();
		$cacheCountryList = verifyCountryRefDataInCache("refCountryList");
		//echo "Cache Country List--><br>"; print_r($cacheCountryList);die;
		echo $cacheCountryList;

	}

}
