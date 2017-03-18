<?php

/**
 * A collection of exchange rates.
 */
class Currencyx_Rate_Collection extends ArrayIterator {

	protected $rates = array();

	/**
	 * Currencyx_Rate_Collection constructor.
	 * @param array $rates
	 */
	public function __construct(array $rates = null) {
		$this->rates = (array)$rates;
	}

	/**
	 * Get an array of all rates.
	 * @return array|Currencyx_Rate[]
	 */
	public function items() {
		return $this->rates;
	}

	/**
	 * Find a rate by currency code.
	 * @param $currency string 3 digit currency code.
	 * @return Currencyx_Rate
	 * @throws Exception
	 */
	public function findCurrency($currency) {
		$currency = strtoupper($currency);

		foreach ($this->items() as $rate) {
			if ($rate->getTargetCurrency() == $currency) {
				return $rate;
			}
		}

		throw new Exception('Invalid or unknown currency: ' . $currency);
	}
}