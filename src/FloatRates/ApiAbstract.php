<?php namespace Rcrowt\CurrencyxModule\FloatRates;

abstract class ApiAbstract {

	/**
	 * GET data from a remote URL.
	 * @param $url string URL where the data is located.
	 * @return string Response data.
	 * @throws \Exception
	 */
	protected static function apiGetData($url) {
		static $cache = array();

		if (!array_key_exists($url, $cache)) {

			// Initialize Connection.
			$handle = curl_init($url);
			curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);

			// Execute and load response data,
			$response = curl_exec($handle);
			$response_status = curl_getinfo($handle, CURLINFO_HTTP_CODE);

			// Close Connection.
			curl_close($handle);

			// check the HTTP status is as expected.
			if ($response_status !== 200) {
				throw new \Exception('Could now download rates from ' . $url . '(Status: ' . $response_status . ')');
			}

			// Store the response to cache.
			$cache[$url] = (string)$response;
		}

		return $cache[$url];
	}

}