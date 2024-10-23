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
class Advc_Infografico_Api
{
    /**
     * Define the request function to endpoint API.
     *
     * Uses the Advc_Infografico_Api class in order to get and register the data from endpoint
     *
     * @since    1.0.0
     * @access   private
     */
    private function process_request()
    {

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
    private function set_persistence($data)
    {
        update_option('advc_infografico_data_content_opt', $data);
    }

    /**
     * Return the persistent data
     * of the plugin.
     *
     * @since    1.0.0
     * @access   private
     */
    private function get_persistence()
    {
        return get_option('advc_infografico_data_content_opt');
    }


    /**
     * Define a new data coming from API or failback to a persistent data
     *
     * @since    1.0.0
     * @access   public
     */
    public function set_data()
    {
        $data = $this->process_request();

        if ($data) {
            $decoded_data = json_decode($data, true);
            // Verifica se a estrutura esperada está presente
            if (isset($decoded_data[0]['acf']['departamentos'])) {
                $departamentos = $decoded_data[0]['acf']['departamentos'];

                // Re-encode os dados de 'departamentos' em JSON
                $filtered_data = json_encode($departamentos);

                // Armazena o dado filtrado em um transiente para cache
                set_transient('advc_infografico_content_data', $filtered_data, 60 * 60 * 24);
                $this->set_persistence($filtered_data);
            }
        } else {
            return $this->get_persistence();
        }
        return isset($filtered_data) ? $filtered_data : null;
    }



    /**
     * Return the API/Transient/Persistent data
     * 
     * @since    1.0.0
     * @access   public
     */

     public function get_data()
     {
         $value = get_transient('advc_infografico_content_data');
         if (false === $value) {
             return $this->set_data();
         }
         return $value;
     }

    /**
     * Return the API/Transient/Persistent data filtered
     * @todo Possible static ??
     * @since    1.0.0
     * @access   public
     */
    public function get_filtered_data($arg)
    {
        $current_data = json_decode($this->get_data(), true);

        // Verifica se $current_data é um array antes de tentar filtrá-lo
        if (is_array($current_data)) {
            return array_values(array_filter($current_data, function ($departamento) use ($arg) {
                // Verifica se o campo 'departamento' existe e é um array
                if (isset($departamento['departamento']) && is_array($departamento['departamento'])) {
                    // Filtra o array 'departamento' para encontrar o slug correspondente
                    $filtered_departamento = array_filter($departamento['departamento'], function ($item) use ($arg) {
                        return isset($item['slug']) && $item['slug'] == $arg;
                    });
                    // Se encontrar algum departamento com o slug correspondente, retorna true para incluí-lo no resultado final
                    if (!empty($filtered_departamento)) {
                        $departamento['departamento'] = array_values($filtered_departamento);
                        return true;
                    }
                }
                return false;
            }));
        }

        // Retorna um array vazio se $current_data não for um array válido
        return [];
    }
    
}
