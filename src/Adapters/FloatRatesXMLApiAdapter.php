<?php namespace Rcrowt\CurrencyxModule\Adapters;

use Rcrowt\CurrencyxModule\ExchangeRate\Api\ApiAdapterInterface;
use Rcrowt\CurrencyxModule\ExchangeRate\Api\ApiInterface;
use Rcrowt\CurrencyxModule\ExchangeRate\ExchangeRate;
use SimpleXMLElement;

class FloatRatesXMLApiAdapter implements ApiAdapterInterface {

	/**
	 * Convert the API Response to ExchangeRate Instances.
	 * @param ApiInterface $api
	 * @return array|ExchangeRate[]
	 */
	public function createExchangeRateArray(ApiInterface $api) {
		$items = [];

		foreach ($api->all() as $x) {

			// Create an instance for the base rate.
			if (!$items) {
				$items[] = $this->createExchangeRateForBase($x);
			}

			$items[] = $this->createExchangeRate($x);
		}

		return $items;
	}

	/**
	 * Create an instance of ExchangeRate form a FloatRates XML Element.
	 * @param SimpleXMLElement $xml
	 * @return ExchangeRate
	 */
	public function createExchangeRate(SimpleXMLElement $xml) {
		$rate = new ExchangeRate();
		$rate->setBaseCurrency((string)$xml->baseCurrency);
		$rate->setBaseName((string)$xml->baseName);
		$rate->setTargetCurrency((string)$xml->targetCurrency);
		$rate->setTargetName((string)$xml->targetName);
		$rate->setRate((float)$xml->exchangeRate);

		return $rate;
	}

	/**
	 * Create an instance of ExchangeRate form a FloatRates XML Element for the base rate.
	 * @param SimpleXMLElement $xml
	 * @return ExchangeRate
	 */
	public function createExchangeRateForBase(SimpleXMLElement $xml) {
		$rate = new ExchangeRate();
		$rate->setBaseCurrency((string)$xml->baseCurrency);
		$rate->setBaseName((string)$xml->baseName);
		$rate->setTargetCurrency((string)$xml->baseCurrency);
		$rate->setTargetName((string)$xml->baseName);
		$rate->setRate(1);

		return $rate;
	}
}