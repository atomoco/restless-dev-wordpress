<?php
/**
 * The template for displaying a post on an authors page
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */
?>

	<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( is_sticky() ) : ?>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'careerspark' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<h4 class="entry-format"><?php _e( 'Featured', 'careerspark' ); ?></h4>
			<?php else : ?>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'careerspark' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php careerspark_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
	</li><!-- #post-<?php the_ID(); ?> -->
