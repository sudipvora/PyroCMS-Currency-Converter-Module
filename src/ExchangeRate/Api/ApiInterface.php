<?php namespace Rcrowt\CurrencyxModule\ExchangeRate\Api;

/**
 * Defines the requirements for currency exchange and API
 */
interface ApiInterface {

	/**
	 * Get all XML Elements containing the relevant data..
	 * @return array
	 */
	public function all();

}