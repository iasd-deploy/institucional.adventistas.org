<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://studiovisual.com.br
 * @since             1.0.0
 * @package           Advc_Infografico
 *
 * @wordpress-plugin
 * Plugin Name:       Adventistas Infografico
 * Plugin URI:        https://studiovisual.com.br
 * Description:       Plugin para coletar dados de um endpoint infrografico e exibi-los através da shortcode [infografico slug="br" class="minha-classe" id="meu-id" el="h1"]
 * Version:           1.0.1
 * Author:            Studio Visual
 * Author URI:        https://studiovisual.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advc-infografico
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ADVC_INFOGRAFICO_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advc-infografico-activator.php
 */
function activate_advc_infografico() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advc-infografico-activator.php';
	Advc_Infografico_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advc-infografico-deactivator.php
 */
function deactivate_advc_infografico() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advc-infografico-deactivator.php';
	Advc_Infografico_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advc_infografico' );
register_deactivation_hook( __FILE__, 'deactivate_advc_infografico' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advc-infografico.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_advc_infografico() {

	$plugin = new Advc_Infografico();
	$plugin->run();

}
run_advc_infografico();
