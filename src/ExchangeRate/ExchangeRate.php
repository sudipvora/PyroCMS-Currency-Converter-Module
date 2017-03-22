<?php namespace Rcrowt\CurrencyxModule\ExchangeRate;

/**
 * Exchange Rate DAO.
 * Class Currencyx_Rate
 */
class ExchangeRate {

	/**
	 * @var string Base currency 3 character ISO-4217 Code.
	 */
	protected $base_currency;

	/**
	 * @var string Base currency name.
	 */
	protected $base_name;

	/**
	 * @var string Target currency 3 character ISO-4217 Code.
	 */
	protected $target_currency;

	/**
	 * @var string Target currency name.
	 */
	protected $target_name;

	/**
	 * @var float Exchange rate between base and target currency.
	 */
	protected $rate;

	/**
	 * @return string
	 */
	public function getBaseCurrency() {
		return $this->base_currency;
	}

	/**
	 * @param string $base_currency
	 */
	public function setBaseCurrency($base_currency) {
		$this->base_currency = (string)$base_currency;
	}

	/**
	 * @return string
	 */
	public function getBaseName() {
		return $this->base_name;
	}

	/**
	 * @param string $base_name
	 */
	public function setBaseName($base_name) {
		$this->base_name = htmlentities((string)$base_name, null, null, false);
	}

	/**
	 * @return string
	 */
	public function getTargetCurrency() {
		return $this->target_currency;
	}

	/**
	 * @param string $target_currency
	 */
	public function setTargetCurrency($target_currency) {
		$this->target_currency = (string)$target_currency;
	}

	/**
	 * @return string
	 */
	public function getTargetName() {
		return $this->target_name;
	}

	/**
	 * @param string $target_name
	 */
	public function setTargetName($target_name) {
		$this->target_name = htmlentities((string)$target_name, null, null, false);
	}

	/**
	 * @return float
	 */
	public function getRate() {
		return $this->rate;
	}

	/**
	 *
	 * @param ExchangeRate $rate Currency to convert to.
	 * @param float|integer $amount Source currency amount (default: 1)
	 * @return float
	 */
	public function getRateForCurrency(ExchangeRate $rate, $amount = 1) {
		return ($this->getRate() / $rate->getRate()) * $amount;
	}

	/**
	 * @param float $rate
	 */
	public function setRate($rate) {
		$this->rate = (float)$rate;
	}

	/**
	 * Cast the unique key as a string for use in views.
	 * @return string
	 */
	public function __toString() {
		return strtolower($this->target_currency);
	}
}