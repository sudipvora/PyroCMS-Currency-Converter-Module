<?php namespace Rcrowt\CurrencyxModule\ExchangeRate;

use Illuminate\Routing\Route;

/**
 * Resolves a route/request to exchange rate information.
 */
class ExchangeRateResolver {

	const DEFAULT_CURRENCY = 'GBP';

	/**
	 * ExchangeRateResolver constructor.
	 * @param ExchangeRateCollection $collection
	 * @param Route $route
	 */
	public function __construct(ExchangeRateCollection $collection, Route $route) {
		$this->route = $route;
		$this->collection = $collection;
	}

	/**
	 * Get the selected (or default) exchange rate.
	 * @return ExchangeRate
	 */
	public function getExchangeRate() {
		return $this->collection->findOrFail($this->route->getParameter('currency', self::DEFAULT_CURRENCY));
	}

	/**
	 * Get the exchange rate collection.
	 * @return ExchangeRateCollection
	 */
	public function getExchangeRateCollection() {
		return $this->collection;
	}

}