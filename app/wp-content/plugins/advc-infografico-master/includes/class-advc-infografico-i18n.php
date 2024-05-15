<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://studiovisual.com.br
 * @since      1.0.0
 *
 * @package    Advc_Infografico
 * @subpackage Advc_Infografico/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Advc_Infografico
 * @subpackage Advc_Infografico/includes
 * @author     Studio Visual <dramos@studiovisual.com.br>
 */
class Advc_Infografico_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'advc-infografico',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
