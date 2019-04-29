<?php 
/**
 * template single untuk menampilkan product
 */
get_header();?>
	<div id="primary" class="site-product">
		<div id="product" role="main">

			<?php while ( have_posts() ) : the_post(); 

			// metabox SKU
			$sku   = get_post_meta(get_the_ID(), 'meta-box-sku', true);
			// metabox price
			$price = get_post_meta(get_the_ID(), 'meta-box-price', true);
			// metabox Best
			$bestSeller = get_post_meta(get_the_ID(), 'meta-box-best', true);

			$isBest = $bestSeller && $bestSeller == 'best-seller' ? 'best-product' : ''; 
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
								echo $isBest ? '<span class="best-seller">Best Seller</span>' : '';?>
							</h1>
							<h2 class="single-price">Rp. <?php echo $price;?></h2>
							<h3 class="single-price">Stock tersisa <?php echo $sku-1;?></h3>
						</header>

						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-product -->
						<footer class="entry-meta">
							<p>Category : <?php echo stOnline_category(get_the_ID());?></p>
							<p>tags : <?php echo stOnline_tags(get_the_ID());?></p>
						</footer><!-- .entry-meta -->
					</article><!-- #post -->
			<?php endwhile; // end of the loop. ?>

		</div><!-- #product -->
	</div><!-- #primary -->
<?php get_footer();?>