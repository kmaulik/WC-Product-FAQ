<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       ka.net
 * @since      1.0.0
 *
 * @package    Wc_Product_Faq_Master
 * @subpackage Wc_Product_Faq_Master/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wc_Product_Faq_Master
 * @subpackage Wc_Product_Faq_Master/includes
 * @author     ka <ka@narola.email>
 */
class Wc_Product_Faq_Master_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wc-product-faq-master',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
