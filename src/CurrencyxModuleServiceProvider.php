<?php namespace Rcrowt\CurrencyxModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Rcrowt\CurrencyxModule\Adapters\FloatRatesJSONApiAdapter;
use Rcrowt\CurrencyxModule\Adapters\FloatRatesXMLApiAdapter;
use Rcrowt\CurrencyxModule\ExchangeRate\Api\ApiAdapterInterface;

class CurrencyxModuleServiceProvider extends AddonServiceProvider {

	/**
	 * @var array Define HTTP Routes used by the module.
	 */
	protected $routes = [

		// Currency Converter and Exchange Rates list.
		'currencyx/{currency?}' => [
			'as' => 'rcrowt.module.currencyx::calculator.index',
			'uses' => 'Rcrowt\CurrencyxModule\Http\Controller\CurrencyxController@calculator',
			'where' => [
				'currency' => '[a-z]{3}'
			]
		]
	];

	/**
	 * @var array Class bindings.
	 */
	protected $bindings = [

		/*
		 * To simulate a different data source comment/uncomment the following lines.
		 * - The first data source is XML from http://www.floatrates.com/daily/gbp.xml
		 * - The second data source is JSON from http://www.floatrates.com/daily/gbp.json
		 */

		// Defines the API Source and Adapter used to load the Exchange Rates. (XML)
		ApiAdapterInterface::class => FloatRatesXMLApiAdapter::class,

		// Defines the API Source and Adapter used to load the Exchange Rates. (JSON)
//		ApiAdapterInterface::class => FloatRatesJSONApiAdapter::class,
	];

}
