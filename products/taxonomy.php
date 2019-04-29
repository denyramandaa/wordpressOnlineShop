<?php
/**
 * Registrasi Taxonomy
 */
add_action( 'init', 'onphpid_taxonomy' , 0 );
add_action( 'init', 'onphpid_taxonomy_films' , 0 );
 
function onphpid_taxonomy() {
	// registrasi category product
	register_taxonomy(
		'product_category',
		'onphpid_products', // post-type name
		array(
			'label' => __( 'Product Category' ),
			'rewrite' => array( 'slug' => 'product-category' ),
			'hierarchical' => true, // true agar menjadi Category
		)
	);
 
	// registrasi tags product
	register_taxonomy(
		'product_tags',
		'onphpid_products', // post-type name
		array(
			'label' => __( 'Product Tags' ),
			'rewrite' => array( 'slug' => 'product-tags' ),
			'hierarchical' => false, // false agar menjadi tags
		)
	);
}

function testing_taxonomy() {
	// registrasi category product
	register_taxonomy(
		'product_category',
		'onphpid_products', // post-type name
		array(
			'label' => __( 'Product Category' ),
			'rewrite' => array( 'slug' => 'product-category' ),
			'hierarchical' => true, // true agar menjadi Category
		)
	);
}
?>