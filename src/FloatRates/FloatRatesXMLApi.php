<?php namespace Rcrowt\CurrencyxModule\FloatRates;
use Rcrowt\CurrencyxModule\ExchangeRate\Api\ApiInterface;

/**
 * API Interface which loads data from the source URL.
 */
class FloatRatesXMLApi implements ApiInterface {

	const API_ENDPOINT = 'http://www.floatrates.com/daily/gbp.xml';

	/**
	 * Create a collection of exchange rates.
	 * @return array|\SimpleXMLElement[]
	 */
	public function all() {
		$items = array();

		// Load exchange rate data.
		$data = self::apiGetData(self::API_ENDPOINT);
		$data = self::parseXml($data);

		// Add objects to array.
		foreach ($data->item as $item){
			$items[] = $item;
		}

		return $items;
	}

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

	/**
	 * @param $xml string Raw XML Data.
	 * @return \SimpleXMLElement
	 * @throws \Exception
	 */
	protected static function parseXml($xml) {
		$xml = utf8_decode($xml);
		return new \SimpleXMLElement($xml, LIBXML_NOERROR);
	}
}