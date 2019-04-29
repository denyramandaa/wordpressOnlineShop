<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'stOnline_credits' ); ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'semi-toko-online' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'semi-toko-online' ); ?>"><?php printf( __( 'Proudly powered by %s', 'semi-toko-online' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>