<?php
function onphpid_post_type()
{
    // add post-type
    register_post_type(
        'onphpid_products',
        array(
            'labels' => array(
              'name' => __('Products', 'semi-toko-online'),
              'singular_name' => __('Product', 'semi-toko-online'),
              'add_new'            => _x( 'Add New', 'product', 'semi-toko-online' ),
              'add_new_item'       => __( 'Add New Product', 'semi-toko-online' ),
              'new_item'           => __( 'New Product', 'twentytwelve' ),
              'edit_item'          => __( 'Edit Product', 'semi-toko-online' ),
              'view_item'          => __( 'View Product', 'semi-toko-online' ),
              'all_items'          => __( 'All Products', 'semi-toko-online' ),
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            'rewrite' => array('slug'=>'product'),
            'menu_position' => 100,
            'menu_icon' => 'dashicons-cart'
        )
  );
}

//register post_type
add_action('init', 'onphpid_post_type');