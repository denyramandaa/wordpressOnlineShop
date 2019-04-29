<?php
/**
 * Template Name: Toko Ku
 */
 
get_header();

// wordpress wp query : https://codex.wordpress.org/Class_Reference/WP_Query
$args = array(
	'posts_per_page' => 10,
	'post_type' => 'onphpid_products'
);

$posts = new WP_Query($args);

echo '<div class="product-wrap">';

if ($posts->have_posts()) {
	while ($posts->have_posts()) {
		$posts->the_post();

		// metabox SKU
		$sku   = get_post_meta(get_the_ID(), 'meta-box-sku', true);
		// metabox price
		$price = get_post_meta(get_the_ID(), 'meta-box-price', true);
		// metabox Best
		$bestSeller = get_post_meta(get_the_ID(), 'meta-box-best', true);

		// membuat nama class best-product melalui
		// check apakah best seller atau bukan 
		// dengan if else inline
		$isBest = $bestSeller && $bestSeller == 'best-seller' ? 'best-product' : ''; 
		?>

		<div class="product-item <?php echo $isBest;?>">
			<a href="<?php the_permalink();?>">
			<div class="product-img">
				<?php
				/**
				 * Menampilkan Gambar
				 */
				if (has_post_thumbnail()) {
					the_post_thumbnail('thumbnail');
				} else { // jika gambar tidak ada 
					?>
					<img src="//placehold.it/150x150/42bdc2/FFFFF" alt="<?php the_title();?>"/>
					<?php
				}
				?>
			</div>

			<h2 class="title-product"><?php the_title();?></h2>	

			<div class="product-details">
				<p class="harga">Rp. <?php echo $price;?></p>	
				<p class="sku">Stock : <?php echo $sku;?></p>
			</div>
			</a>
		</div>

		<?php
	}
} else {
   ?>
    <div class="product-no-item">
      <h4>Oops!! No Product Exists</h4>
    </div>
  <?php
}

echo '</div>'; // end .produc-wrap
?>

<?php get_footer();?>