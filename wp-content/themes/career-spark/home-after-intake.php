<?php
/**
 * Template Name: Homepage Template (after intake)
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
            		<?php the_content(); ?>
            	</div><!-- .entry-content -->
          
            </section>
          
          </article>
          </div>
          <div class="clear"></div>
          </div>
          </div>
          
          <div class="container-red">
            <div class="top"></div>
            <div class="container-content1">
              
               <h1>The YouthMap Internship Programme</h1>
          
            	<section class="internship">
            	
            	 <div class="internship-about">
              	 <h3>About the Internship</h3>
              	 <p>The YouthMap Internship Programme is a pilot programme equipping young Ugandan graduates with the skills and practical experience required to work, lead and contribute to development. 100 young people will be recruited and placed with employers from a range of sectors for a period of six months. These young people will receive training, mentoring and networking opportunities to support their successful transition into employment.</p>
              	 
            	 
                 <h3>Our internship partners:</h3>
              	 <div class="internship-partners">
                   <a href="http://www.usaid.gov" class="partner-usaid" target="_blank">USAID</a><span class="sep">|</span><a href="http://www.iyfnet.org" class="partner-iyf" target="_blank">International Youth Foundation</a>
              	 </div>
              	 
            	 </div>
            	 
            	 <div class="internship-apply">
              	 <h3>Applications are closed!</h3>
              	 <p>Sorry, internship applications are now closed and we are now processing all applications. Keep checking <a href="http://www.facebook.com/pages/Career-Spark/129083250596614" style="color:#fff;">our Facebook page</a> for updates.</p>
          
                  <div class="icon-online"><a href="mailto:internship@career-spark.org" style="color:#fff;">internship@career-spark.org</a></div>
                  <div class="icon-tel"><span>Tel: </span>0332 276 185</div>

<p>Restless Development Uganda
          Plot 6 Acacia Road, P.O. Box 1208, Jinja
          or 2727 Muyenga Road, Kampala</p>
          
            	 </div>
            	 
            	 <div class="clear"></div>
            	 
            	</section>
          
            </div>
            <div class="bottom"></div>
          </div>
          
          <div class="container-grey">
            <div class="container-content1">
            
               <h1>More from CareerSpark!</h1>
               
               <p>Come back to the site soon to view:</p>
               
               <ul>
                <li>Articles for young people who are studying, working, job hunting and self-employed</li>
                <li>A directory of companies hiring young professionals</li>
                <li>Web pages of young professionals seeking employment</li>
               </ul>
               
               <br />
               <h2>Find CareerSpark on Facebook</h2>
               
               <div class="fb-like-box" data-href="http://www.facebook.com/pages/Career-Spark/129083250596614" data-width="555" data-show-faces="true" data-stream="false" data-border-color="#F9F9F9" data-header="false"></div>

				<?php endwhile; // end of the loop. ?>

		</div><!-- #primary -->

<?php get_footer(); ?>