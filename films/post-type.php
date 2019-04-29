<?php
function films_post_type()
{
  // add post-type
    register_post_type(
        'onphpid_films',
        array(
            'labels' => array(
              'name' => __('Films', 'semi-toko-online'),
              'singular_name' => __('Films', 'semi-toko-online'),
              'add_new'            => _x( 'Add New', 'films', 'semi-toko-online' ),
              'add_new_item'       => __( 'Add New Films', 'semi-toko-online' ),
              'new_item'           => __( 'New Films', 'twentytwelve' ),
              'edit_item'          => __( 'Edit Films', 'semi-toko-online' ),
              'view_item'          => __( 'View Films', 'semi-toko-online' ),
              'all_items'          => __( 'All Films', 'semi-toko-online' ),
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug'=>'films'),
            'menu_position' => 100,
            'menu_icon' => 'dashicons-editor-video'
        )
  );
}

//register post_type
add_action('init', 'films_post_type');