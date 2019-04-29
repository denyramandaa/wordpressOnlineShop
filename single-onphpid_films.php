<?php 
/**
 * template single untuk menampilkan product
 */
get_header();?>
	<div id="primary" class="site-product">
		<div id="product" role="main">

			<?php while ( have_posts() ) : the_post(); 

			$duration   = get_post_meta(get_the_ID(), 'meta-box-duration', true);
			// metabox price flm
			$price_film = get_post_meta(get_the_ID(), 'meta-box-price_films', true);
			// metabox recommended
			$recommend = get_post_meta(get_the_ID(), 'meta-box-recommend', true);

			$isRecommend = $recommend && $recommend == 'recommend' ? 'Recommended' : ''; 
			?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<?php
							/**
							 * Menampilkan Gambar
							 */
							if (has_post_thumbnail()) {
								the_post_thumbnail();
							} else { // jika gambar tidak ada 
								?>
								<img src="//placehold.it/624x351/42bdc2/FFFFF" alt="<?php the_title();?>"/>
								<?php
							}
							?>
							<h1 class="entry-title"><?php the_title(); ?>
								<?php
								// if inline untuk menunjukan produk ini best seller atau bukan
								echo $isRecommend ? '<span class="best-seller">Best Seller</span>' : '';?>
							</h1>
							<h2 class="single-price">Rp. <?php echo $price_film;?></h2>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-product -->
						<footer class="entry-meta">
							<p>Category : <?php echo stOnline_category_films(get_the_ID());?></p>
							<p>tags : <?php echo stOnline_tags_films(get_the_ID());?></p>
						</footer><!-- .entry-meta -->
					</article><!-- #post -->
			<?php endwhile; // end of the loop. ?>

		</div><!-- #product -->
	</div><!-- #primary -->
<?php get_footer();?>