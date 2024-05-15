<?php

/**
 * Fired during call for api endpoint
 *
 * @link       https://studiovisual.com.br
 * @since      1.0.0
 *
 * @package    Advc_Infografico_Template
 * @subpackage Advc_Infografico_Template/includes
 */

/**
 * Fired during call for api endpoint
 *
 * This class defines all code necessary render the shortcode template.
 *
 * @since      1.0.0
 * @package    Advc_Infografico_Template
 * @subpackage Advc_Infografico_Template/includes
 * @author     Studio Visual <dramos@studiovisual.com.br>
 */
class Advc_Infografico_Template {
   
    /**
	 * The Api object
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Advc_Infografico_Api    $api    Maintains and registers all functions for the api plugin.
	 */
	protected $api;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the pluin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct() {
       $this->load_dependencies();
	}

    /**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Advc_Infografico_Api. Load the API dependence.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the API functions
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advc-infografico-api.php';

		$this->api = new Advc_Infografico_Api();
	}

    /**
	 * Return the template rendered
	 * @since    1.0.0
	 * @access   public
     * @todo     better validation on attr?
	 */
    public function render($data){
        if ( is_array($data) ) {

            $content = $this->api->get_filtered_data($data['slug']) ? $this->api->get_filtered_data($data['slug'])[0]['attributes']['Valor'] : 'sem dados';

            $class      = ' class="' . esc_html($data['class']) . '"';
            $id         = ' id="' . esc_html($data['id']) . '"';

            echo '<' . esc_html($data['el']) . $class . $id . ' >' . $content . '</' . esc_html($data['el']) . '>';
        }
    }
}
