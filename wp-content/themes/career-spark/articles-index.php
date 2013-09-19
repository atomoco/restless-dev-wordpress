<?php
/**
 * Template Name: Articles index template
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
          
          <article>
          
            <div class="fixed">
            	<div class="fixed-inner">
              	<aside class="social">
                	<div class="fb-like" data-href="http://career-spark.ug" data-send="false" data-layout="button_count" data-width="142" data-show-faces="false" data-font="arial"></div>
              	</aside>
            	</div>
            </div>
          
            <section id="post-<?php the_ID(); ?>" class="" <?php post_class(); ?>>
            	<header class="home-header">
            		<h1 class="home-title"><?php the_title(); ?></h1>
            	</header><!-- .entry-header -->
            
            	<div class="home-content">
            	
            	  
            	  <ul class="articles-index">
            	  <?php
            	      $all_posts = get_posts( array( 'post__not_in' => array( $post->ID ), 'posts_per_page' => 999 ) );
      
       
                  foreach ( $all_posts as $article_post ) {
                  
                    
                    $author = $article_post->post_author;
                    $name = get_the_author_meta('display_name', $author);
                  
                    echo '<li><a href="' . get_permalink( $article_post->ID ) . '"><h4>' . apply_filters( 'the_title', $article_post->post_title, $article_post->ID ) . '</h4>
                    <small>'.$name.'</small></a></li>';
                  }
                 ?>
            	  </ul>
            	
            	
            	</div><!-- .entry-content -->
          
            </section>
          
          </article>
          </div>
          <div class="clear"></div>
          </div>
          </div>
          
          <div class="container-grey">
            <div class="container-content1">
            
               <h1>More from CareerSpark!</h1>
               
               <p>Come back to the site soon to view:</p>
               
               <ul>
                <li>A directory of companies hiring young professionals</li>
                <li>Web pages of young professionals seeking employment</li>
               </ul>
               
               <br />
               <h2>Find CareerSpark on Facebook</h2>
               
               <div class="fb-like-box" data-href="http://www.facebook.com/pages/Career-Spark/129083250596614" data-width="555" data-show-faces="true" data-stream="false" data-border-color="#F9F9F9" data-header="false"></div>

				<?php endwhile; // end of the loop. ?>

		</div><!-- #primary -->

<?php get_footer(); ?>