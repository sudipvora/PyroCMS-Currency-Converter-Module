<?php namespace Rcrowt\CurrencyxModule\ExchangeRate\Api;

use Rcrowt\CurrencyxModule\ExchangeRate\ExchangeRate;

/**
 * An adapter maps the API Response data to the Model/DAO.
 */
interface ApiAdapterInterface {

	/**
	 * Convert an API Response to ExchangeRate Instances.
	 * @return array|ExchangeRate[]
	 */
	public function getExchangeRates();

}