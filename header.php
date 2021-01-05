<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bree_Turner_v2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Cardo|Josefin+Sans" rel="stylesheet"> 
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .site-branding -->
		<div id="menu">
			<img id="menu-toggle" src="<?php echo get_template_directory_uri() . "/images/icons/menu.svg" ?>" alt="Menu Icon"/>
			<div id="menu-dropdown">
				<ul>
					<li>
						<a href="#about">About</a>
					</li>
					<li>
						<a href="#portfolio">Work</a>
					</li>
					<li>
						<a href="#contact">Contact</a>
					</li>
				</ul>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">