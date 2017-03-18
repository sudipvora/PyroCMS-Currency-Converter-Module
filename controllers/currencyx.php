<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property \Template $template
 * @property \MY_Loader $load
 */
class Currencyx extends Public_Controller {

	const DEFAULT_CURRENCY = 'GBP';

	public function __construct() {
		parent::__construct();

		// Load the required libraries/classes.
		$this->load->library('Currencyx_Rate');
		$this->load->library('Currencyx_Floatrates_Api');
		$this->load->library('Currencyx_Rate_Collection');
	}

	/**
	 * Show the currency conversion calculator.
	 * @param string $currency_code Optional currency code.
	 */
	public function calculator($currency_code = null) {

		// Load rates.
		try {
			$rate_collection = Currencyx_Floatrates_Api::createCurrencyxRateCollection();
			$rate_base = $rate_collection->findCurrency($currency_code ? $currency_code : self::DEFAULT_CURRENCY);
		} catch (Exception $e) {
			error_log($e->getMessage());
			show_error('Problem loading currency data, please try again later.');
			return;
		}

		// Generate output.
		$this->template->title('Currency Conversion Calculator');
		$this->template->append_js('jquery.js');
		$this->template->append_js('module::calculator.js');
		$this->template->set('rate_collection', $rate_collection);
		$this->template->set('rate_base', $rate_base);
		$this->template->build('calculator');
	}

}
