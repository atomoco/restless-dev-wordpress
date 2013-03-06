<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */
?>
<article>

  <section id="post-<?php the_ID(); ?>" class="" <?php post_class(); ?>>
  	<header class="entry-header">
  		<h1 class="entry-title"><?php the_title(); ?></h1>
  	</header><!-- .entry-header -->
  
  	<div class="entry-content">
  		<?php the_content(); ?>
  	</div><!-- .entry-content -->
  	<footer class="entry-meta">
  		<?php edit_post_link( __( 'Edit', 'careerspark' ), '<span class="edit-link">', '</span>' ); ?>
  	</footer><!-- .entry-meta -->
  </section><!-- #post-<?php the_ID(); ?> -->
  
</article>
