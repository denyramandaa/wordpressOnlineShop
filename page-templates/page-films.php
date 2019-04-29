<?php
/**
 * Template Name: Films
 */
 
get_header();

// wordpress wp query : https://codex.wordpress.org/Class_Reference/WP_Query
$args = array(
	'posts_per_page' => 10,
	'post_type' => 'onphpid_films'
);

$posts = new WP_Query($args);

echo '<div class="product-wrap">';

if ($posts->have_posts()) {
	while ($posts->have_posts()) {
		$posts->the_post();

		// metabox durasi
		$duration   = get_post_meta(get_the_ID(), 'meta-box-duration', true);
		// metabox price flm
		$price_film = get_post_meta(get_the_ID(), 'meta-box-price_films', true);
		// metabox recommended
		$recommend = get_post_meta(get_the_ID(), 'meta-box-recommend', true);

		// membuat nama class best-product melalui
		// check apakah best seller atau bukan 
		// dengan if else inline
		$isRecommend = $recommend && $recommend == 'recommend' ? 'Recommended' : ''; 
		?>

		<div class="product-item <?php echo $isRecommend;?>">
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
				<p class="harga">Rp. <?php echo $price_film;?></p>	
				<p class="durasi">Durasi : <?php echo $duration;?></p>
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