<?php
/**
 * Registrasi Taxonomy
 */
add_action( 'init', 'onphpid_taxonomy_films' , 0 );
 

function onphpid_taxonomy_films() {
	// registrasi category product
	register_taxonomy(
		'films_category',
		'onphpid_films', // post-type name
		array(
			'label' => __( 'Films Category' ),
			'rewrite' => array( 'slug' => 'films-category' ),
			'hierarchical' => true, // true agar menjadi Category
		)
	);
 
	// registrasi tags product
	register_taxonomy(
		'films_tags',
		'onphpid_films', // post-type name
		array(
			'label' => __( 'Films Tags' ),
			'rewrite' => array( 'slug' => 'films-tags' ),
			'hierarchical' => false, // false agar menjadi tags
		)
	);
}

function testing_taxonomy_films() {
	// registrasi category product
	register_taxonomy(
		'films_category',
		'onphpid_films', // post-type name
		array(
			'label' => __( 'Films Category' ),
			'rewrite' => array( 'slug' => 'films-category' ),
			'hierarchical' => true, // true agar menjadi Category
		)
	);
}
?>