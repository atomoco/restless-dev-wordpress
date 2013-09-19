<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */

get_header(); ?>

		<div id="primary" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			  <!--
				<nav id="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'careerspark' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'careerspark' ) ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'careerspark' ) ); ?></span>
				</nav>
				--><!-- #nav-single -->

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          	<header class="entry-header">
          		<h1 class="entry-title"><?php the_title(); ?></h1>
          
          		<?php if ( 'post' == get_post_type() ) : ?>
          		<div class="entry-meta">
          			<?php careerspark_posted_on(); ?>
          		</div><!-- .entry-meta -->
          		<?php endif; ?>
          	</header><!-- .entry-header -->
          	
          	<div class="fixed">
            	<div class="fixed-inner">
              	<aside class="social">
              	
              	  <a href="" class="button"><span class="icon-button-mail"></span>Email page</a>
                	<div class="fb-like" data-href="<?=get_permalink( $post->ID )?>" data-send="false" data-width="50" data-show-faces="false" data-font="arial"></div>
                	
              	</aside>
            	</div>
          	</div>
          	
          	<div class="entry-meta">
          		<?php
          			/* translators: used between list items, there is a space after the comma */
          			$categories_list = get_the_category_list( __( ', ', 'careerspark' ) );
          
          			/* translators: used between list items, there is a space after the comma */
          			/*
          			$tag_list = get_the_tag_list( '', __( ', ', 'careerspark' ) );
          			if ( '' != $tag_list ) {
          				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'careerspark' );
          			} elseif ( '' != $categories_list ) {
          				$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'careerspark' );
          			} else {
          				$utility_text = __( 'This entry was posted. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'careerspark' );
          			}
          			*/
          
          			printf(
          				$utility_text,
          				$categories_list,
          				$tag_list,
          				esc_url( get_permalink() ),
          				the_title_attribute( 'echo=0' ),
          				get_the_author(),
          				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
          			);
          		?>
          		<?php edit_post_link( __( 'Edit', 'careerspark' ), '<span class="edit-link">', '</span>' ); ?>
          
          	</div><!-- .entry-meta -->
          
          	<div class="entry-content">
          		<?php the_content(); ?>
          		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'careerspark' ) . '</span>', 'after' => '</div>' ) ); ?>
          	</div><!-- .entry-content -->
          	
          </article><!-- #post-<?php the_ID(); ?> -->


				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #primary #content -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>