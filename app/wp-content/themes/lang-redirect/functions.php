<?php

function redirect_based_on_browser_language() {
    $user_language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    $supported_languages = array('pt', 'es'); 

    if (in_array($user_language, $supported_languages)) {
        $language_code = $user_language;
    } else {
        $language_code = 'es';
    }
		
    $redirect_url = home_url('/' . $language_code . '/');
    wp_redirect($redirect_url);
    exit;
}

add_action('template_redirect', 'redirect_based_on_browser_language');