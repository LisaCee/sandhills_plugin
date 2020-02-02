<?php
/**
 * Plugin Name: Show_my_ip
 * Description: A simple custom post type with a shortcode to show users ip address
 * Version: 1.0
 * Author: Lisa Canini
 * Author URI: http://www.lisacanini.com
 */


function get_my_ip() {
    //check if saved data
    if (false === ($body = get_transient('body'))) {
        //if not, get response from api
        $response = wp_remote_get('https://bot.whatismyipaddress.com/');
        //make it readable
        $body =  wp_remote_retrieve_body($response);
    }
    //save ip address for one hour
    set_transient('body', $body, HOUR_IN_SECONDS);
    //print ip address to site
    printf('<p id="my_ip">Your IP address is: <b>%s</b></p>', $body);
    
}
// creating action
add_action('ip_content', 'get_my_ip');
//creating shortcode
add_shortcode('ip_address', 'get_my_ip');