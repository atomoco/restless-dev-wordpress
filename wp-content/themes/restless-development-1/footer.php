<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Restless_Development_1
 * @since Restless Development 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'restlessdevelopment1_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'restlessdevelopment1' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'restlessdevelopment1' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'restlessdevelopment1' ), 'WordPress' ); ?></a>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>