<?php

/**
 * Fired during call for api endpoint
 *
 * @link       https://studiovisual.com.br
 * @since      1.0.0
 *
 * @package    Advc_Infografico
 * @subpackage Advc_Infografico/includes
 */

/**
 * Fired during call for api endpoint
 *
 * This class defines all code necessary to run during the api call.
 *
 * @since      1.0.0
 * @package    Advc_Infografico
 * @subpackage Advc_Infografico/includes
 * @author     Studio Visual <dramos@studiovisual.com.br>
 */
class Advc_Infografico_Api {
    /**
	 * Define the request function to endpoint API.
	 *
	 * Uses the Advc_Infografico_Api class in order to get and register the data from endpoint
	 *
	 * @since    1.0.0
	 * @access   private
	 */
    private function process_request(){
        $url = "https://api.adventistas.dev/dados?fields%5B0%5D=slug&fields%5B1%5D=valor&pagination%5BpageSize%5D=250";
        $response = wp_remote_get($url, array(
            'timeout' => 30,
            'httpversion' => '1.1'
        ));

        if (is_wp_error($response)) {
            return false;
        } else {
            return wp_remote_retrieve_body($response);
        }
    }

    /**
	 * Define a persistent data if the transient fails
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
    private function set_persistence($data){
        update_option('advc_infografico_data_content_opt', $data);
    }

    /**
	 * Return the persistent data
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
    private function get_persistence(){
        return get_option('advc_infografico_data_content_opt');
    }

    /**
	 * Define a new data coming from API or failback to a persistent data
	 *
	 * @since    1.0.0
	 * @access   public
	 */
    public function set_data(){
        $data = $this->process_request();

        if($data) {
            set_transient('advc_infografico_content_data', $data, 60*60*72 );
            $this->set_persistence($data);
        } else {
            return $this->get_persistence();
        }

        return $data;
    }

    /**
	 * Return the API/Transient/Persistent data
     * 
	 * @since    1.0.0
	 * @access   public
	 */
    public function get_data(){
        $value = get_transient( 'advc_infografico_content_data' );
        if ( false === ( $value = get_transient( 'advc_infografico_content_data' ) ) ) {
            return $this->set_data();
        } else {
            return $value;
        }
    }

    /**
	 * Return the API/Transient/Persistent data filtered
	 * @todo Possible static ??
	 * @since    1.0.0
	 * @access   public
	 */
    public function get_filtered_data($arg){
        $current_data = json_decode($this->get_data(), true);

        return array_values(array_filter($current_data['data'], function ($var) use ($arg) {
            return ($var['attributes']['slug'] == $arg);
        }));
    }
}
