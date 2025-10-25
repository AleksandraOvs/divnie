<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gutpurple
 */

?>

<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package untheme
 */

?>

<?php if ($shortcode = carbon_get_theme_option('crb_order_shortcode')) {
?>

	<!-- <div class="hidden">
		<div class="popup-order" id="popup-order"> -->
	<?php //echo $popup_sale_short 

	echo do_shortcode(" $shortcode ");

	?>
	<?php //echo do_shortcode('[contact-form-7 id="72c1f3a" title="Contact form 1"]'); 
	?>
	<!-- </div>
	</div> -->
<?php
}
?>

<footer id="colophon" class="site-footer">
	<div class="fixed-container">
		<div class="footer-columns">

			<div class="footer-columns__first">
				<?php
				$footer_logo = get_theme_mod('footer_logo');
				$img = wp_get_attachment_image_src($footer_logo, 'full');
				if ($img) : echo '<a class="custom-logo-link" href="' . site_url() . '"><img src="' . $img[0] . '" alt=""></a>';
				endif;
				?><p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>

			</div>


			<?php if (is_active_sidebar('footer-sidebar-1')) : ?>
				<div class="footer-col">
					<?php dynamic_sidebar('footer-sidebar-1'); ?>
				</div>
			<?php endif; ?>

			<?php if (is_active_sidebar('footer-sidebar-2')) : ?>
				<div class="footer-col">
					<?php dynamic_sidebar('footer-sidebar-2'); ?>
				</div>
			<?php endif; ?>


			<div class="footer-col contacts-col">
				<?php get_template_part('template-parts/contacts-block') ?>
			</div>
		</div>


		<?php if (is_active_sidebar('footer-sidebar-3')) : ?>
			<div class="footer-col-bottom">
				<?php dynamic_sidebar('footer-sidebar-3'); ?>
			</div>
		<?php endif; ?>

	</div>

	<?php
	if (current_user_can('administrator')) {
	?>
		<div class="show-temp"><?php echo get_current_template(); ?> </div>
	<?php
	}
	?>

</footer><!-- #colophon -->
<?php get_template_part('template-parts/floating-buttons') ?>

</div><!-- #page -->
<div class="arrow-up">
	<svg width="23" height="37" viewBox="0 0 23 37" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M12.4166 1.15529C12.3647 1.10387 12.308 1.0575 12.2473 1.0168L12.155 0.966794C12.0857 0.922317 12.0087 0.891019 11.928 0.874471L11.8319 0.847544C11.6845 0.818513 11.533 0.818513 11.3856 0.847544L11.2856 0.878319L11.1702 0.912939C11.1306 0.931257 11.0921 0.951807 11.0548 0.974489L10.974 1.02065C10.9103 1.06337 10.8511 1.11234 10.7971 1.16683L0.445356 11.507C0.316232 11.6075 0.209948 11.7343 0.133556 11.8789C0.0571638 12.0236 0.0124093 12.1829 0.00226167 12.3462C-0.00788593 12.5095 0.0168053 12.6731 0.0746971 12.8261C0.132589 12.9791 0.222357 13.1181 0.338049 13.2338C0.45374 13.3495 0.592709 13.4393 0.745737 13.4972C0.898765 13.555 1.06236 13.5797 1.22565 13.5696C1.38895 13.5594 1.54822 13.5147 1.69291 13.4383C1.83759 13.3619 1.96438 13.2556 2.06485 13.1265L10.447 4.75588L10.447 35.8226C10.447 36.1286 10.5686 36.4222 10.785 36.6386C11.0014 36.855 11.295 36.9766 11.601 36.9766C11.9071 36.9766 12.2006 36.855 12.4171 36.6386C12.6335 36.4222 12.7551 36.1286 12.7551 35.8226L12.7551 4.75588L21.1372 13.1265C21.3593 13.2993 21.6368 13.385 21.9175 13.3675C22.1983 13.3501 22.4631 13.2307 22.662 13.0317C22.8609 12.8328 22.9803 12.5681 22.9978 12.2873C23.0152 12.0065 22.9295 11.729 22.7567 11.507L12.4166 1.15529Z" fill="white" />
	</svg>
</div>
<?php wp_footer(); ?>

</body>

</html>