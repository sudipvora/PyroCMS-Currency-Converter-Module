# Currency Conversion Module for PyroCMS
This module downloads exchange rates from [floatrates.com](http://www.floatrates.com/daily/gbp.xml) and presents them in a simple table. It also allows you convert rates between any currency.

It's possible to easily change data source by commenting/un-commenting 2 lines of code in the [Service Provider](https://github.com/RCrowt/PyroCMS-Currency-Converter-Module/blob/laravel/src/CurrencyxModuleServiceProvider.php). This is to demonstrate the abstraction between data source and data use.
## Requirements
This module was created for [PyroCMS 2.2](https://github.com/pyrocms/pyrocms/tree/2.2/master) which is built on the Codeigniter MVC Framework.  It was then upgraded to work with the latest version of PyroCMS on Laravel.
## Usage
One the Module has been installed navigate to /currencyx in your browser.
* Instantly convert between any 2 currencies.
* View exchange rates for all currencies by clicking them in the exchange rates list.
