<?php namespace Rcrowt\CurrencyxModule\Http\Controller;

use Anomaly\Streams\Platform\Http\Controller\PublicController;
use Illuminate\Contracts\View\View;
use Rcrowt\CurrencyxModule\ExchangeRate\ExchangeRateResolver;

class CurrencyxController extends PublicController {

	/**
	 * Show the currency conversion calculator.
	 * @param ExchangeRateResolver $resolver
	 * @return View
	 * @internal param string $currency_code Optional currency code.
	 */
	public function calculator(ExchangeRateResolver $resolver) {

		// Set the page title.
		$this->template->set('meta_title', 'Currency Conversion Calculator');

		// Return the view.
		return $this->view->make('module::calculator', [
			'rate_collection' => $resolver->getExchangeRateCollection(),
			'rate_base' => $resolver->getExchangeRate()
		]);
	}

}
