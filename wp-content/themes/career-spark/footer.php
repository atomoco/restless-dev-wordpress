<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */
?>

	</div><!-- #main -->

</div><!-- #page -->

<footer id="colophon" class="container_12" role="contentinfo">

		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>

		<div id="site-generator">
			<?php do_action( 'careerspark_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'careerspark' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'careerspark' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'careerspark' ), 'WordPress' ); ?></a>
		</div>
</footer><!-- #colophon -->

<script type='text/javascript'>
  //<![CDATA[
    window.jQuery || document.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js">\x3C/script>')
  //]]>
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/logo-fixed.js" type="text/javascript"></script>

<?php wp_footer(); ?>

</body>
</html>