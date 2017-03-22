<?php namespace Rcrowt\CurrencyxModule\Adapters;

use Rcrowt\CurrencyxModule\ExchangeRate\Api\ApiAdapterInterface;
use Rcrowt\CurrencyxModule\ExchangeRate\ExchangeRate;
use Rcrowt\CurrencyxModule\FloatRates\FloatRatesJSONApi;
use Symfony\Component\HttpFoundation\ParameterBag;

class FloatRatesJSONApiAdapter implements ApiAdapterInterface {

	const BASE_CURRENCY = 'GBP';
	const BASE_CURRENCY_NAME = 'Quids';

	/**
	 * @var FloatRatesJSONApi
	 */
	protected $api;

	/**
	 * FloatRatesJSONApiAdapter constructor.
	 * @param FloatRatesJSONApi $api
	 */
	public function __construct(FloatRatesJSONApi $api) {
		$this->api = $api;
	}


	/**
	 * Convert the API Response to ExchangeRate Instances.
	 * @return array|ExchangeRate[]
	 */
	public function getExchangeRates() {
		$items = [];
		$items[] = $this->createExchangeRateForBase();

		// Create the base rate item.
		foreach ($this->api->all() as $bag) {
			$bag = new ParameterBag((array)$bag);
			if ($bag->has('code') && $bag->has('name') && $bag->has('rate')) {
				$items[] = $this->createExchangeRate($bag);
			}
		}

		return $items;
	}

	/**
	 * Create an instance of ExchangeRate form a FloatRates XML Element.
	 * @param ParameterBag $bag
	 * @return ExchangeRate
	 */
	protected function createExchangeRate(ParameterBag $bag) {
		$rate = new ExchangeRate();
		$rate->setBaseCurrency(self::BASE_CURRENCY);
		$rate->setBaseName(self::BASE_CURRENCY_NAME);
		$rate->setTargetCurrency((string)$bag->get('code'));
		$rate->setTargetName((string)$bag->get('name'));
		$rate->setRate((float)$bag->get('rate'));

		return $rate;
	}

	/**
	 * Create an instance of ExchangeRate form a FloatRates XML Element for the base rate.
	 * @return ExchangeRate
	 */
	protected function createExchangeRateForBase() {
		$rate = new ExchangeRate();
		$rate->setBaseCurrency(self::BASE_CURRENCY);
		$rate->setBaseName(self::BASE_CURRENCY_NAME);
		$rate->setTargetCurrency(self::BASE_CURRENCY);
		$rate->setTargetName(self::BASE_CURRENCY_NAME);
		$rate->setRate(1);

		return $rate;
	}
}