<?php
/**
 * Plugin Name:     Exclude pages from Search
 * Plugin URI:      https://studiovisual.com.br
 * Description:     Remove páginas dos resultados de pesquisa e adiciona apenas os post_types ('voce-precisa-saber', 'nossas-crencas', 'documentos', 'sedes-e-instituicoes') na pesquisa ?s=% ou ?q=% 
 * Author:          Studio Visual
 * Author URI:      https://github.com/studiovisual
 * Text Domain:     eps
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Eps
 */

function search_filter_pages($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array('voce-precisa-saber', 'nossas-crencas', 'documentos', 'sedes-e-instituicoes'));
    }

    return $query;
}
add_filter('pre_get_posts','search_filter_pages');