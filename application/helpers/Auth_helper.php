<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('getBaseUrl')) {

	function getBaseUrl() {
		return $baseurl = "http://localhost/pcillp_apps/app_search_api/rest/api";
	}
}

if (!function_exists('getErrorString')) {

	function getErrorString($Error = '', $Description = '') {
		$errorMsg = '';
		if (!empty($Error)) {
			$errorMsg = "Error->" . $Error;
			$errorMsg .= "<br>Description->" . $Description;
		}
		return $errorMsg;
	}
}

if (!function_exists('getAppConfig')) {

	function getAppConfig() {
		return $config = array('username' => 'pcillp_app_user', 'password' => '12345');
	}
}

if (!function_exists('get_data')) {

	function get_data($url) {
		$data = '';
		if (!empty($url)) {
			$ch = curl_init();
			$timeout = 5;

			$config = getAppConfig();
			$username = $config['username'];
			$password = $config['password'];

			$base_url = getBaseUrl();
			$api_call_url = $base_url . $url;

			curl_setopt($ch, CURLOPT_URL, $api_call_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			curl_setopt($ch, CURLOPT_USERPWD, "$username:$password"); // Add This Line
			$data = curl_exec($ch);
			curl_close($ch);
		} else {
			$data = 'Please provide vaild rest api url.';
		}
		return $data;
	}
}

if (!function_exists('post_data')) {

	function post_data($url = '', $postDataString = '') {
		$data = '';
		if (!empty($url)) {
			if (!empty($postDataString)) {
				$timeout = 5;

				$config = getAppConfig();
				$username = $config['username'];
				$password = $config['password'];

				$base_url = getBaseUrl();
				$api_call_url = $base_url . $url;
				//echo "<br>api_call_url-->$api_call_url";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $api_call_url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataString);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Accept:application/json'));
				curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				$data = curl_exec($ch);
				curl_close($ch);
			}
		}

		return $data;
	}
}
