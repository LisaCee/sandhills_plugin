<?php
// creating public custom post type
function custom_ip_init() {
    $args = array(
        'public' => true,
        'label' => 'ip_address'
    );
    register_post_type('ip_address', $args);
};

// creating action
add_action('init', 'custom_ip_init');