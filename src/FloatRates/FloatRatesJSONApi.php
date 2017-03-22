<?php namespace Rcrowt\CurrencyxModule\FloatRates;

class FloatRatesJSONApi extends ApiAbstract {

	const API_ENDPOINT = 'http://www.floatrates.com/daily/gbp.json';

	/**
	 * Create a collection of exchange rates.
	 * @return array|array[]
	 * @throws \Exception
	 */
	public function all() {

		// Load exchange rate data.
		$data = self::apiGetData(self::API_ENDPOINT);

		// Parse Data
		$data = @json_decode($data);

		if ($data) {
			return $data;
		} else {
			throw new \Exception('Problem parsing Feed Data');
		}
	}
}