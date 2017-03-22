<?php namespace Rcrowt\CurrencyxModule\ExchangeRate\Api;

use Rcrowt\CurrencyxModule\ExchangeRate\ExchangeRate;

/**
 * An adapter maps the API Response data to the Model/DAO.
 */
interface ApiAdapterInterface {

	/**
	 * Convert an API Response to ExchangeRate Instances.
	 * @param ApiInterface $api
	 * @return array|ExchangeRate[]
	 */
	public function createExchangeRateArray(ApiInterface $api);

}