<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://studiovisual.com.br
 * @since      1.0.0
 *
 * @package    Advc_Infografico
 * @subpackage Advc_Infografico/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Advc_Infografico
 * @subpackage Advc_Infografico/public
 * @author     Studio Visual <dramos@studiovisual.com.br>
 */
class Advc_Infografico_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

    /**
	 * The template object
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Advc_Infografico_Template  $template    Maintains and registers all functions for the template plugin.
	 */
	protected $template;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        $this->load_dependencies();

        // Invoke shortcode function
        add_shortcode('infografico', array($this, 'advc_infografico_shortcode'));
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
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-advc-infografico-template.php';

        $this->template = new Advc_Infografico_Template();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advc_Infografico_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advc_Infografico_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advc-infografico-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advc_Infografico_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advc_Infografico_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advc-infografico-public.js', array( 'jquery' ), $this->version, false );

	}

    /**
	 * Shortcode function to generate infografico.
	 *
	 * @since    1.0.0
	 */
    public function advc_infografico_shortcode($atts) {
        ob_start();

        $atts = shortcode_atts(
            array(
                'class' => '',
                'id'    => '',
                'slug'  => 'idiomas',
                'el'    => 'span'
            ), $atts, 'infografico'
        );

        $this->template->render($atts);

        return ob_get_clean();
    }

}
