<?php
require_once 'application/libraries/ignite_php_client/vendor/autoload.php';

use Apache\Ignite\Client;
use Apache\Ignite\ClientConfiguration;
use Apache\Ignite\Exception\ClientException;
use Apache\Ignite\Type\ObjectType;

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('getBaseUrl')) {

	function getBaseUrl() {
		return $baseurl = "http://localhost/pcillp_apps/app_search_api/rest/api";
	}
}

if (!function_exists('verifyCountryRefDataInCache')) {

	function verifyCountryRefDataInCache($keyValue) {
		$client = new Client();
		$returnValue = "";
		try {
			$client->connect(new ClientConfiguration('127.0.0.1:10800'));
			$cache = $client->getOrCreateCache('myCache')->setKeyType(ObjectType::STRING)->setValueType(ObjectType::STRING);

			if (!empty($cache->get($keyValue))) {
				$returnValue = $cache->get($keyValue);
			} else {
				$setCache = '[{}]';
				if ($keyValue == "refCountryList") {

					$callURL = "/refCountryCodes";
					$getCache = get_data($callURL);
					if (!empty($getCache)) {
						$setCache = json_decode($getCache);
						if (isset($setCache[0]) && !empty($setCache[0])) {
							$setCache = $getCache;
						}
					}
				}

				$cache->put($keyValue, $setCache);
				$returnValue = $cache->get($keyValue);
			}

		} catch (ClientException $e) {
			echo "<br>ClientException -->";
			echo $e->getMessage();

		} finally {
			$client->disconnect();
			return $returnValue;
		}
	}
}

//No more need because created for POC test
if (!function_exists('checkCacheCountryDataExist')) {

	function checkCacheCountryDataExist($keyValue, $searchText) {
		$client = new Client();
		$value = "";
		try {
			$client->connect(new ClientConfiguration('127.0.0.1:10800'));
			$cache = $client->getOrCreateCache('myCache')->setKeyType(ObjectType::STRING)->setValueType(ObjectType::STRING);

			if (!empty($cache->get($keyValue))) {
				$value = $cache->get($keyValue);
			} else {
				$setCache = '[{}]';
				if ($keyValue == "countryList") {
					//echo "under Cache Funtion<br>"; print_r($keyValue);
					$baseurl = getBaseUrl();
					$callURL = $baseurl . "/countryList?searchText=" . $searchText;
					//echo $callURL;

					$getCache = get_data($callURL);
					//echo "<br>"; print_r($getCache);die;

					if (!empty($getCache)) {
						$setCache = json_decode($getCache);
						if (isset($setCache[0]) && !empty($setCache[0])) {
							$setCache = $getCache;
						}
					}
				}

				$cache->put($keyValue, $setCache);
				$value = $cache->get($keyValue);
			}
			//put and get value
			//echo "<br> Client ID --> $value";

		} catch (ClientException $e) {
			echo ($e->getMessage());
		} finally {
			$client->disconnect();
			return $value;
		}
	}
}

if (!function_exists('loadDataInCache')) {

	function loadDataInCache($keyValue, $searchText) {
		$client = new Client();
		$value = "";
		try {
			$client->connect(new ClientConfiguration('127.0.0.1:10800'));
			$cache = $client->getOrCreateCache('myCache')->setKeyType(ObjectType::STRING)->setValueType(ObjectType::STRING);

			$setCache = '[{}]';
			if ($keyValue == "countryList") {
				//echo "under Cache Funtion<br>"; print_r($keyValue);

				$baseurl = getBaseUrl();
				$callURL = $baseurl . "/countryList?searchText=" . $searchText;
				//echo $callURL;
				$getCache = get_data($callURL);
				//echo "<br>"; print_r($getCache);die;

				if (!empty($getCache)) {
					$setCache = json_decode($getCache);
					if (isset($setCache[0]) && !empty($setCache[0])) {
						$setCache = $getCache;
					}
				}
			}

			$cache->put($keyValue, $setCache);
			$value = $cache->get($keyValue);

			// put and get value
			//echo "<br> Client ID --> $value";

		} catch (ClientException $e) {
			echo ($e->getMessage());
		} finally {
			$client->disconnect();
			return $value;
		}
	}
}

if (!function_exists('checkCacheStateDataExist')) {

	function checkCacheStateDataExist($keyValue, $ctid, $searchText) {
		$client = new Client();
		$value = "";
		try {
			$client->connect(new ClientConfiguration('127.0.0.1:10800'));
			$cache = $client->getOrCreateCache('myCache')->setKeyType(ObjectType::STRING)->setValueType(ObjectType::STRING);

			// if($cache->get($keyValue) != $ctid){
			// 	clearCache();
			// }
			if (!empty($cache->get($keyValue))) {
				$value = $cache->get($keyValue);
			} else {
				$setCache = '[{}]';
				if ($keyValue == "stateListByCountry") {
					//echo "under Cache Funtion<br>"; print_r($keyValue);

					$baseurl = getBaseUrl();
					$callURL = $baseurl . "/stateListByCountry?ctid=" . $ctid . "&searchText=" . $searchText;
					//echo $callURL;
					$getCache = get_data($callURL);
					//echo "<br>"; print_r($getCache);die;

					if (!empty($getCache)) {
						$setCache = json_decode($getCache);
						if (isset($setCache[0]) && !empty($setCache[0])) {
							$setCache = $getCache;
						}
					}
				}

				$cache->put($keyValue, $setCache);
				$value = $cache->get($keyValue);
			}
			//put and get value
			//echo "<br> Client ID --> $value";

		} catch (ClientException $e) {
			echo ($e->getMessage());
		} finally {
			$client->disconnect();
			return $value;
		}
	}
}

if (!function_exists('loadStateDataInCache')) {

	function loadStateDataInCache($keyValue, $ctid, $searchText) {
		$client = new Client();
		$value = "";
		try {
			$client->connect(new ClientConfiguration('127.0.0.1:10800'));
			$cache = $client->getOrCreateCache('myCache')->setKeyType(ObjectType::STRING)->setValueType(ObjectType::STRING);

			$setCache = '[{}]';
			if ($keyValue == "stateListByCountry") {
				//echo "under Cache Funtion<br>"; print_r($keyValue);

				$baseurl = getBaseUrl();
				$callURL = $baseurl . "/stateListByCountry?ctid=" . $ctid . "&searchText=" . $searchText;

				//echo $callURL;
				$getCache = get_data($callURL);
				//echo "<br>"; print_r($getCache);die;

				if (!empty($getCache)) {
					$setCache = json_decode($getCache);
					if (isset($setCache[0]) && !empty($setCache[0])) {
						$setCache = $getCache;
					}
				}
			}

			$cache->put($keyValue, $setCache);
			$value = $cache->get($keyValue);

			// put and get value
			//echo "<br> Client ID --> $value";

		} catch (ClientException $e) {
			echo ($e->getMessage());
		} finally {
			$client->disconnect();
			return $value;
		}
	}
}

if (!function_exists('clearCache')) {

	function clearCache() {
		$client = new Client();
		try {
			$client->connect(new ClientConfiguration('127.0.0.1:10800'));
			$cache = $client->getOrCreateCache('myCache');
			$cache->clear();
			return;

		} catch (ClientException $e) {
			echo ($e->getMessage());
		} finally {
			$client->disconnect();
		}
	}
}
