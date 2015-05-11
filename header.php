<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpzaamx
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php get_template_part( 'template-parts/header', 'extras' ); ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>  itemscope itemtype="http://schema.org/WebPage">


<div id="page" class="hfeed site container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpzaamx' ); ?></a>

	<header id="masthead" class="site-header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<p id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></p>

			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
			
			<?php wp_nav_menu(array(
				'container' => 'div',                           // remove nav container
				'container_class'   => 'collapse navbar-collapse', //ZAAMX clase de contenedor 
				//'container_class' => 'menu clearfix',           // class of container (should you choose to use it)
				'container_id'      => 'menu-primario',
				'menu' => __( 'Menu Primario', 'wpzaamx' ),  // nav name
				'menu_class' => 'nav navbar-nav',               // adding custom nav class
				'theme_location' => 'primary',                 // where it's located in the theme
				//'before' => '',                                 // before the menu
				//'after' => '',                                  // after the menu
				//'link_before' => '',                            // before each link
				//'link_after' => '',                             // after each link
				'depth' => 2,                                   // limit the depth of the nav
				'fallback_cb' => 'wp_bootstrap_navwalker::fallback', // Modo de respaldo 
				'walker' => new wp_bootstrap_navwalker()
			)); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
