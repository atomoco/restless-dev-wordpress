<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */

get_header(); ?>

		<section id="primary" role="main" class="grid_8">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>

				<header class="page-header">
					<h1 class="page-title author"><?php printf( __( 'Author: %s', 'careerspark' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
				</header>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php careerspark_content_nav( 'nav-above' ); ?>

				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div id="author-info">
					<div id="author-avatar" class="about-author-avatar about-author-avatar-big">
            <?php
              // try getting an image from the "user photo" plugin first: http://wordpress.org/extend/plugins/user-photo/
        			if(function_exists('userphoto_exists') && userphoto_exists($author)){
        				userphoto_thumbnail($author);
        			} else {
        		    // fall back to gravatar
        			  $avatar = get_avatar($authordata->ID, 64);
        			  // or fall back to blank image
          			if (!$avatar) {
          				$avatar = '<img src="' . RDAWABSPATH . 'images/no-image.gif' . '" width="80" height="80" border="0" alt="no photo">';
          			}
          			echo $avatar;
        			}
      			?>
					</div>
					<div id="author-description">
						<?php the_author_meta( 'description' ); ?>
					</div><!-- #author-description	-->
				</div><!-- #author-info -->
				<?php endif; ?>

        <br />

        <?php
          $post_count = wp_count_posts();
          $post_count = strval($post_count->publish);
          if (sizeof($post_count) > 0) {
            echo '<h2>Articles by this author:</h2>';
          }
        ?>
				<?php /* Start the Loop */ ?>
				<ul class="author-articles">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'author-post' );
					?>

				<?php endwhile; ?>
				</ul>

				<?php careerspark_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'careerspark' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'careerspark' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

		</section><!-- #primary #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>