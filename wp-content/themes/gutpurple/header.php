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

	<script src="//code.jivo.ru/widget/06WBWEgOHa"></script>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m, e, t, r, i, k, a) {
			m[i] = m[i] || function() {
				(m[i].a = m[i].a || []).push(arguments)
			};
			m[i].l = 1 * new Date();
			for (var j = 0; j < document.scripts.length; j++) {
				if (document.scripts[j].src === r) {
					return;
				}
			}
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
		})(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

		ym(94866918, 'init', {
			webvisor: true,
			clickmap: true,
			referrer: document.referrer,
			url: location.href,
			accurateTrackBounce: true,
			trackLinks: true
		});
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/94866918" style="position:absolute; left:-9999px;" alt="" /></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->






	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m, e, t, r, i, k, a) {
			m[i] = m[i] || function() {
				(m[i].a = m[i].a || []).push(arguments)
			};
			m[i].l = 1 * new Date();
			for (var j = 0; j < document.scripts.length; j++) {
				if (document.scripts[j].src === r) {
					return;
				}
			}
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
		})(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

		ym(97343746, 'init', {
			webvisor: true,
			clickmap: true,
			ecommerce: "dataLayer",
			referrer: document.referrer,
			url: location.href,
			accurateTrackBounce: true,
			trackLinks: true
		});
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/97343746" style="position:absolute; left:-9999px;" alt="" /></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->


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

					</div>

					<div class="header-main__right">
						<?php get_template_part('template-parts/contacts-block') ?>
						<nav class="header-nav">

							<?php wp_nav_menu([
								'container' => false,
								'theme_location'  => 'main_menu',
								'walker' => new Main_walker_menu,
								'depth'           => 2,
							]); ?>

							<?php get_template_part('template-parts/contacts-block') ?>



						</nav>



						<a href="#" class="menu-toggle" onclick="event.preventDefault();">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</a>
					</div>

				</div>
			</div>






		</header><!-- #masthead -->