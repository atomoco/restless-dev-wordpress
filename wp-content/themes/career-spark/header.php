<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Career_Spark
 * @since Career Spark 1.0
 */
 
if ($_SERVER['SERVER_NAME']=='81.91.243.58') {
  header("HTTP/1.1 301 Moved Permanently"); 
  header("Location: http://career-spark.ug"); 
  exit;
}
			
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]> ><! <![endif]-->
<html <?php language_attributes(); ?> class="no-js">
<!-- <![endif] -->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name='MobileOptimized' content='320' />
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'careerspark' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php
  if ( !function_exists('rd_designswitch_print_switch') OR DESIGNSWITCH == 'high' ) {
?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php    
  } else {
?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo str_replace('style.', 'style.low.', get_bloginfo( 'stylesheet_url' )); ?>" />
<?php    
  }
?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.js" type="text/javascript"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js" type="text/javascript"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type="text/javascript">
  /* google analytics */
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39216241-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body <?php body_class(); ?> id="<?php echo get_option('current_page_template'); ?>">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<a name="top"></a>

<header id="logo" class="fixed">
  <div class="fixed-inner">
    <a id="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.png" alt="Career Spark" border="0" />
      <h1><?php bloginfo( 'name' ); ?></h1>
      <span id="logo-back1"></span>
      <span id="logo-back2"></span>
    </a>
  </div>
</header>


<header id="branding" role="banner">
  <div class="branding-inner">
    	
    <nav id="nav1">
  		<h3 class="assistive-text"><?php _e( 'Main menu', 'careerspark' ); ?></h3>
  		<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'careerspark' ); ?>"><?php _e( 'Skip to primary content', 'careerspark' ); ?></a></div>
  		<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'careerspark' ); ?>"><?php _e( 'Skip to secondary content', 'careerspark' ); ?></a></div>
      <?php 
        // default WP nav menu overwridden
        //wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
      ?>
      <div class="nav1-main">
        <a name="advice" id="nav1-advice" href="/?page_id=116">
          <div></div>
          <h4>Advice</h4>
          <p>
            <span><span>career guidance,</span></span> articles &amp; discussion
          </p>
        </a>
        <span class="sep">|</span>
        <a name="talent" id="nav1-alumni">
          <div></div>
          <h4>Talent</h4>
          <p>
            coming soon!
            <!--<span><span>young professionals</span></span> seeking employment-->
          </p>
        </a>
        <span class="sep">|</span>
        <a name="employers" id="nav1-employers">
          <div></div>
          <h4>Employers</h4>
          <p>
            coming soon!
            <!--<span><span>companies hiring young</span></span> professionals-->
          </p>
        </a>
      </div>
    </nav>
    <div class="clear"></div>
  </div>
</header>


<div id="container" class="container-content1">

  <h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>

	<?php
  	if (function_exists('rd_designswitch_print_switch')) {
    	echo rd_designswitch_print_switch();
  	}
  ?>


	<div id="main">
	
   <?php 
     $breadcrumb = breadcrumb_trail();
     if (is_single()) {
	     echo str_replace('You\'re in:</b>', 'You\'re in:</b> <a href="/advice/">Advice</a> <span class="breadcrumb-sep">/</span> ', $breadcrumb);
     } else {
	     echo $breadcrumb;
     }
   ?>
