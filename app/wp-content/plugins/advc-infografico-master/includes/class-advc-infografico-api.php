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
    
        $url = "https://api.adventistas.org/dados/v2";

    
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
    public function get_filtered_data($arg) {
        $current_data = json_decode($this->get_data(), true);
    
        if (isset($current_data[0]['acf']['departamentos'])) {
            return array_values(array_filter($current_data[0]['acf']['departamentos'], function ($departamento) use ($arg) {
                // Filtrar o departamento para encontrar o slug correspondente
                $filtered_departamento = array_filter($departamento['departamento'], function ($item) use ($arg) {
 
                    return $item['slug'] == $arg;
                });
                // Se encontrar algum departamento com o slug correspondente, retorna true para incluí-lo no resultado final
                if (!empty($filtered_departamento)) {
                    // Atualiza o array com o departamento filtrado
                    $departamento['departamento'] = array_values($filtered_departamento);
                    return true;
                }
                return false; 
            }));
        }
        // Retorna um array vazio se o JSON não estiver no formato esperado
        return [];
    }     
}
