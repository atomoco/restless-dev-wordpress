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

<footer id="colophon" role="contentinfo">
  <div class="container-wide">
  
    <h1>Career Spark</h1>
    
    <h4 class="outro">
      Careerspark is an online platform providing information, ideas and connections to enable you to build and develop your career. 
      Careerspark is powered by <a href="http://www.restlessdevelopment.org" target="_blank">Restless Development</a> with support from a network of partners committed to youth development in Uganda.
    </h4>
    
    <div class="partners partners-primary">
      <a href="http://www.restlessdevelopment.org" class="partner-rd" target="_blank">Restless Development</a>
      <span class="sep">|</span>
      <a href="http://forwardfoundation.org.uk" class="partner-ff" target="_blank">Forward Foundation</a>
    </div>

		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>

		<div id="site-generator">
			<?php do_action( 'careerspark_credits' ); ?>
		</div>
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