<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Currency Conversion Module.
 */
class Module_Currencyx extends Module {

	public $version = '0.1.0';

	/**
	 * Get information about the module.
	 * @return array
	 */
	public function info() {
		return array(
			'name' => array('en' => 'Currency Conversion Calculator'),
			'description' => array('en' => 'A currency conversion calculator based on real-time data from floatrates.com'),
			'frontend' => true,
			'backend' => false,
		);
	}

	/**
	 * Module install handler.
	 * @return bool	Whether the module was uninstalled
	 */
	public function install() {
		return true;
	}

	/**
	 * Module uninstall handler.
	 * @return bool Whether the module was uninstalled
	 */
	public function uninstall() {
		return true;
	}

	/**
	 * Module upgrade handler.
	 * @param string $old_version
	 * @return bool Whether the module was installed
	 */
	public function upgrade($old_version) {
		return true;
	}
}
