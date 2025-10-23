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

<footer id="colophon" class="site-footer">
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'gutpurple')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'gutpurple'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'gutpurple'), 'gutpurple', '<a href="http://underscores.me/">Underscores.me</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php
if (current_user_can('administrator')) {
?>
	<div class="show-temp"><?php echo get_current_template(); ?> </div>
<?php
}
?>

<div id="main-form" style="display:none;max-width:600px;">
	<?php
	if ($mainform_shortcode = carbon_get_theme_option('crb_mainform_shortcode')) {
		echo do_shortcode($mainform_shortcode);
	}
	?>
</div>

<?php wp_footer(); ?>

</body>

</html>