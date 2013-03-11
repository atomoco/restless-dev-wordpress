<?php
/**
 * Template Name: Homepage Template
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */

update_option('current_page_template','home');

get_header(); ?>

		<div>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'home' ); ?>

				<?php endwhile; // end of the loop. ?>

		</div><!-- #primary -->

<?php get_footer(); ?>