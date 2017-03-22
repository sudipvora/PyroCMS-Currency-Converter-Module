<?php namespace Rcrowt\CurrencyxModule\FloatRates;

/**
 * API Interface which loads data from the source URL.
 */
class FloatRatesXMLApi extends ApiAbstract {

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
	 * @param $xml string Raw XML Data.
	 * @return \SimpleXMLElement
	 * @throws \Exception
	 */
	protected static function parseXml($xml) {
		$xml = utf8_decode($xml);
		return new \SimpleXMLElement($xml, LIBXML_NOERROR);
	}
}