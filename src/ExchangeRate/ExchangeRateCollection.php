<?php namespace Rcrowt\CurrencyxModule\ExchangeRate;

use Rcrowt\CurrencyxModule\ExchangeRate\Api\ApiAdapterInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * A collection of exchange rates.
 */
class ExchangeRateCollection extends \ArrayIterator {

	protected $items = array();

	/**
	 * Currencyx_Rate_Collection constructor.
	 * @param ApiAdapterInterface $adapter
	 * @internal param array $rates
	 */
	public function __construct(ApiAdapterInterface $adapter) {
		$this->items = $adapter->getExchangeRates();
	}

	/**
	 * Get an array of all rates.
	 * @return array|ExchangeRate[]
	 */
	public function items() {
		return $this->items;
	}

	/**
	 * Find a rate by currency code.
	 * @param $currency string 3 digit currency code.
	 * @return ExchangeRate
	 * @throws NotFoundHttpException
	 */
	public function findOrFail($currency) {
		$currency = strtoupper($currency);

		foreach ($this->items() as $rate) {
			if ($rate->getTargetCurrency() == $currency) {
				return $rate;
			}
		}

		throw new NotFoundHttpException('Invalid or unknown currency: ' . $currency);
	}
}