<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package untheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'untheme'); ?></a>

		<header id="masthead" class="site-header">
			<div class="header-main">
				<div class="fixed-container">
					<div class="site-branding">
						<?php
						$header_logo = get_theme_mod('header_logo');
						$img = wp_get_attachment_image_src($header_logo, 'full');
						if ($img) : echo '<a class="custom-logo-link" href="' . site_url() . '"><img src="' . $img[0] . '" alt=""></a>';
						endif;
						?>
						<?php
						if (is_front_page() && is_home()) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<!-- <p><?php //bloginfo('description'); 
									?></p> -->
						<?php
						else :
						?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
						<?php
						endif;
						?>

					</div>

					<?php get_template_part('template-parts/contacts-block') ?>

					<a href="#" class="menu-toggle" onclick="event.preventDefault();">
						<div class="bar"></div>
						<div class="bar"></div>
						<div class="bar"></div>
					</a>
					<!-- </div> -->

				</div>
			</div>

			<nav class="header-nav">
				<div class="fixed-container">
					<?php wp_nav_menu([
						'container' => false,
						'theme_location'  => 'main_menu',
						'walker' => new Main_walker_menu,
						'depth'           => 2,
					]); ?>

					<?php get_template_part('template-parts/contacts-block') ?>
				</div>


			</nav>




		</header><!-- #masthead -->