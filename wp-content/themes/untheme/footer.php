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
		<div class="site-info">
			<?php
			$footer_logo = get_theme_mod('footer_logo');
			$img = wp_get_attachment_image_src($footer_logo, 'full');
			if ($img) : echo '<img class="footer-logo-img" src="' . $img[0] . '" alt="">';
			endif;
			?>

			<div class="copyright">
				<div><span><?php bloginfo('name'); ?></span><span>&copy;</span><span><?php echo ', ' . date('Y') . 'г.'; ?></span></div>
				<p><?php bloginfo('description'); ?></p>

			</div>

		</div><!-- .site-info -->

		<div class="site-footer__right">
			<?php if (is_active_sidebar('footer-sidebar1')) : ?>
				<ul class="footer-widget">
					<?php dynamic_sidebar('footer-sidebar1'); ?>
				</ul>
			<?php endif; ?>

			<?php get_template_part('template-parts/contacts-block') ?>

			<?php if (is_active_sidebar('footer-sidebar2')) : ?>
				<ul class="footer-widget">
					<?php dynamic_sidebar('footer-sidebar2'); ?>
				</ul>
			<?php endif; ?>
		</div>





	</div>

	<?php
	if (current_user_can('administrator')) {
	?>
		<div class="show-temp"><?php echo get_current_template(); ?> </div>
	<?php
	}
	?>
	
	<div id="cf7-success-modal" class="cf7-modal">
  <div class="cf7-modal-content">
    <span class="cf7-close">&times;</span>
    <p class="thank-you-message">Thank you! Your message has been sent. We will contact you shortly.

</p>
  </div>
</div>

</footer><!-- #colophon -->
<?php get_template_part('template-parts/floating-buttons') ?>
<div style="display: none; width: 500px;" id="form-popup">
	<?php
	if ($footer_contactform = carbon_get_theme_option('crb_fb_second_shortcode')) {
		$fb_head = carbon_get_theme_option('crb_fb_second_head');
		$fb_desc = carbon_get_theme_option('crb_fb_second_desc');

		if (!empty($fb_head)) {
			echo '<h3>' . $fb_head . '</h3>';
		}

		if (!empty($fb_desc)) {
			echo '<p class="form-description">' . $fb_desc . '</p>';
		}

		echo do_shortcode(" $footer_contactform ");
	}
	?>
</div>

<div style="display: none; width: 500px;" id="form-popup2">
	
	<?php echo do_shortcode('[contact-form-7 id="efd6f7d" title="Form for Request for price"]') ?>
	
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>