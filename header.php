<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpautomate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>
<?php
global $theme_options;
$rtl_support = $theme_options['opt-rtl-status'];
$rtl_body = '';
if ($rtl_support==='1') {
	$rtl_body = 'rtl';
}
 ?>

<body <?php body_class($rtl_body); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text hidden" href="#content"><?php esc_html_e( 'Skip to content', 'wpautomate' ); ?></a>

	<header id="masthead" class="site-header container" role="banner">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<div class="header-top-bar">


			<!-- The WordPress Menu goes here -->
			<?php

			$menuarguments = array(
				'theme_location'  => 'primary',
				'container' => false,
				'menu_class'      => 'main-navigation',
				'menu_id'         => 'main-menu',
			);

			wp_nav_menu($menuarguments);

			 ?>
		</div><!-- .navbar -->
	</header><!-- #masthead -->

<?php
	global $post;
	$site_container = 'container';
	$row_class= "row";
	$prefix = '_page_';
	$hide_sidebar = get_post_meta( get_the_ID(), $prefix . 'hide_sidebar', true );

	if( has_shortcode( $post->post_content, 'vc_row')  && $hide_sidebar==='on' ) {
		$site_container = 'container-wide page-has-vc';
		$row_class= "row-wide";
	}

?>
<div id="content" class="site-content <?php echo esc_attr($site_container); ?>">
	<div class="<?php echo esc_attr($row_class); ?>">
