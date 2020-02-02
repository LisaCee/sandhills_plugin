<?php
// creating public custom post type
function lisa_book_post() {
    $args = array(
       'labels' => array(
           'name' => __('Books'),
           'singular_name' => __('Book')
       ),
       'public' => true
    );
    register_post_type('lisa_address', $args);
};

// creating action
add_action('init', 'lisa_book_post');

//adding post type to front end
function lisa_book_post_on_front_end() {
    if ($query->is_home() && $query->is_main_query()) {
        $query->set('post_type', array('post', 'lisa_book'));
    }
}

add_action('pre_get_posts', 'lisa_book_post_on_front_end');

