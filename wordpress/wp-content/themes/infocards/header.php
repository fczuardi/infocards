<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

wp_enqueue_script( 'infocards-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), '2011-10-19' );

?><!doctype html>
<!--[if IE 6]>
<html id="ie6" class="oldie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="oldie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="oldie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=IE7">

<!-- Mobile viewport optimized: j.mp/bplateviewport -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" /> 

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
		echo ' | ' . sprintf( __( 'Page %s', 'infocards' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/curvycorners.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
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
	if ($post->post_name){
   $extraclasses = 'slug-'.$post->post_name;
	}
	wp_head();
?>
</head>

<body <?php body_class($extraclasses); ?>>
<div id="page" class="hfeed">
	<header id="site-header" role="banner">
	    <div id="bg-strip">
    	    <div id="bg-strip-left" class="strip"></div>
    	    <div id="bg-strip-right" class="strip"></div>
  	  </div>
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
			</hgroup>

			<nav id="access" role="navigation">
				<h3 class="assistive-text"><?php _e( 'Main menu', 'infocards' ); ?></h3>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'infocards' ); ?>"><?php _e( 'Skip to primary content', 'infocards' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'infocards' ); ?>"><?php _e( 'Skip to secondary content', 'infocards' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'div', 'container_class' => 'menu', 'menu_class' => '' ) ); ?>
			</nav><!-- #access -->
	</header><!-- #branding -->


	<div id="main">