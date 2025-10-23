<?php

/**
 * gutpurple Theme Customizer
 *
 * @package gutpurple
 */

/**
 * Добавляем поддержку live preview для site title и tagline
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gutpurple_customize_register($wp_customize)
{
	// Live preview для заголовка и описания сайта
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', [
			'selector'        => '.site-title a',
			'render_callback' => 'gutpurple_customize_partial_blogname',
		]);
		$wp_customize->selective_refresh->add_partial('blogdescription', [
			'selector'        => '.site-description',
			'render_callback' => 'gutpurple_customize_partial_blogdescription',
		]);
	}

	// --- Кастомные цвета ---
	$colors = [
		'black'   => '#000000',
		'primary'   => '#0073aa',
		'secondary' => '#005177',
		'accent'    => '#d54e21',
	];

	foreach ($colors as $slug => $default) {
		$wp_customize->add_setting("mytheme_{$slug}_color", [
			'default'   => $default,
			'transport' => 'refresh',
		]);

		$wp_customize->add_control(new WP_Customize_Color_Control(
			$wp_customize,
			"mytheme_{$slug}_color",
			[
				'label'   => ucfirst($slug) . ' Color',
				'section' => 'colors',
			]
		));
	}

	$wp_customize->add_setting('header_logo', array(
		'default' => '',
		//'height' => '48',
		'width' => '280',
		'sanitize_callback' => 'absint',
	));
	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(

		'section' => 'title_tagline',
		'label' => 'Логотип Header'

	)));
	$wp_customize->add_setting('footer_logo', array(
		'default' => '',
		'sanitize_callback' => 'absint',
	));

	$wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
		'section' => 'title_tagline',
		'label' => 'Логотип Footer'
	)));
}
add_action('customize_register', 'gutpurple_customize_register');

/**
 * Рендер заголовка для selective refresh
 */
function gutpurple_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Рендер описания для selective refresh
 */
function gutpurple_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * JS для live preview в кастомайзере
 */
function gutpurple_customize_preview_js()
{
	wp_enqueue_script(
		'gutpurple-customizer',
		get_template_directory_uri() . '/js/customizer.js',
		['customize-preview'],
		_S_VERSION,
		true
	);
}
add_action('customize_preview_init', 'gutpurple_customize_preview_js');

/**
 * Фронтенд: проброс CSS-переменных
 */
function mytheme_customizer_colors()
{
	$black   = get_theme_mod('mytheme_primary_color', '#000000');
	$primary   = get_theme_mod('mytheme_primary_color', '#0073aa');
	$secondary = get_theme_mod('mytheme_secondary_color', '#005177');
	$accent    = get_theme_mod('mytheme_accent_color', '#d54e21');
?>
	<style>
		:root {
			--wp--preset--color--black: <?php echo esc_attr($black); ?>;
			--wp--preset--color--primary: <?php echo esc_attr($primary); ?>;
			--wp--preset--color--secondary: <?php echo esc_attr($secondary); ?>;
			--wp--preset--color--accent: <?php echo esc_attr($accent); ?>;
		}
	</style>
<?php
}
add_action('wp_head', 'mytheme_customizer_colors');

/**
 * Редактор Gutenberg: проброс CSS-переменных
 * Без wp_add_inline_style, чтобы не было рекурсии
 */
function mytheme_editor_customizer_colors_head()
{
	$black   = get_theme_mod('mytheme_primary_color', '#000000');
	$primary   = get_theme_mod('mytheme_primary_color', '#0073aa');
	$secondary = get_theme_mod('mytheme_secondary_color', '#005177');
	$accent    = get_theme_mod('mytheme_accent_color', '#d54e21');
?>
	<style>
		:root {
			--wp--preset--color--black: <?php echo esc_attr($black); ?>;
			--wp--preset--color--primary: <?php echo esc_attr($primary); ?>;
			--wp--preset--color--secondary: <?php echo esc_attr($secondary); ?>;
			--wp--preset--color--accent: <?php echo esc_attr($accent); ?>;
		}
	</style>
<?php
}
add_action('admin_head', 'mytheme_editor_customizer_colors_head');

/**
 * Подключение стилей блоков Gutenberg и на фронтенде, и в редакторе
 */
// function mytheme_enqueue_block_styles()
// {
// 	wp_enqueue_style(
// 		'mytheme-blocks',
// 		get_template_directory_uri() . '/css/blocks.css',
// 		[],
// 		'1.0'
// 	);
// }
// add_action('enqueue_block_assets', 'mytheme_enqueue_block_styles');
