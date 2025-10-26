<?php

/**
 * gutpurple functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gutpurple
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gutpurple_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gutpurple, use a find and replace
		* to change 'gutpurple' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('gutpurple', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main_menu' => esc_html__('Primary', 'gutpurple'),
			'services' => esc_html__('Services', 'gutpurple'),
			'footer_menu' => esc_html__('Footer menu', 'gutpurple'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'gutpurple_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'gutpurple_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gutpurple_content_width()
{
	$GLOBALS['content_width'] = apply_filters('gutpurple_content_width', 640);
}
add_action('after_setup_theme', 'gutpurple_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gutpurple_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'gutpurple'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Виджет для отображения на внутренних страницах', 'gutpurple'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Sidebar 1', 'gutpurple'),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'gutpurple'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Sidebar 2', 'gutpurple'),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__('Add widgets here.', 'gutpurple'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Sidebar 3', 'gutpurple'),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__('Add widgets here.', 'gutpurple'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'gutpurple_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function gutpurple_scripts()
{
	wp_enqueue_style('gutpurple-style', get_stylesheet_uri(), array(), null);
	wp_style_add_data('gutpurple-style', 'rtl', 'replace');

	wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/css/fonts.css', array(), time());
	wp_enqueue_style('swiper_styles', get_stylesheet_directory_uri() . '/inc/swiper/swiper-bundle.min.css', array(), time());

	//wp_enqueue_style('color_palette', get_stylesheet_directory_uri() . '/css/color-palette.css', array(), time());
	wp_enqueue_style('theme_styles', get_stylesheet_directory_uri() . '/css/styles.css', array(), time());

	wp_enqueue_script('gutpurple-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('themescript', get_template_directory_uri() . '/js/scripts.js', array(), null, true);
	wp_enqueue_script('swiper_scripts', get_template_directory_uri() . '/inc/swiper/swiper-bundle.min.js', array(), null, true);
	wp_enqueue_script('swiper_script', get_template_directory_uri() . '/js/slider-scripts.js', array(), null, true);

	// Стили
	wp_enqueue_style(
		'fancybox',
		'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css',
		array(),
		null
	);

	// Скрипт
	wp_enqueue_script(
		'fancybox',
		'https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js',
		array(), // можно добавить 'jquery' если нужно
		null,
		true // грузить в footer
	);

	// Путь к файлу относительно корня темы
	// $script_path = get_template_directory_uri() . '/js/editor-media-text-px.js';

	// wp_enqueue_script(
	// 	'media-text-px-control',             // Уникальный хэндл
	// 	$script_path,                        // Путь к файлу
	// 	['wp-blocks', 'wp-dom', 'wp-edit-post', 'wp-element', 'wp-components', 'wp-compose', 'wp-hooks', 'wp-block-editor'], // зависимости
	// 	filemtime(get_template_directory() . '/js/editor-media-text-px.js'), // версия = время последнего изменения файла
	// 	true                                 // загружаем внизу
	// );
}
add_action('wp_enqueue_scripts', 'gutpurple_scripts');

// function gutpurple_add_scripts()
// {

// }
// add_action('wp_enqueue_scripts', 'gutpurple_add_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/walker.php';

require get_template_directory() . '/inc/post-types.php';

/**
 * Carbon fields.
 */

require get_template_directory() . '/inc/carbon-fields.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Guttenberg support
 */

// function mytheme_setup()
// {
// 	// Добавляем поддержку блоков
// 	add_theme_support('align-wide'); // Поддержка широкого и полного выравнивания
// 	add_theme_support('editor-styles'); // Позволяет использовать кастомные стили в редакторе
// 	add_theme_support('wp-block-styles'); // Подключает стили по умолчанию для блоков
// 	add_theme_support('responsive-embeds'); // Адаптивные вставки (видео и др.)

// }
// add_action('after_setup_theme', 'mytheme_setup');

// add_action('after_setup_theme', function () {
// 	// Включаем поддержку стилей редактора
// 	add_theme_support('editor-styles');
// });

// Подключаем стиль только для редактора
add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_style(
		'gutpurple-editor-styles',
		get_template_directory_uri() . '/css/style-editor.css',
		array(),
		wp_get_theme()->get('Version')
	);
});


//разрешить загрузку свг только админам
function allow_svg_upload_for_admins($mimes)
{
	if (current_user_can('administrator')) {
		$mimes['svg'] = 'image/svg+xml';
	}
	return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload_for_admins');

add_filter('template_include', 'var_template_include', 1000);
function var_template_include($t)
{
	$GLOBALS['current_theme_template'] = basename($t);
	return $t;
}

function get_current_template($echo = false)
{
	if (!isset($GLOBALS['current_theme_template']))
		return false;
	if ($echo)
		echo $GLOBALS['current_theme_template'];
	else
		return $GLOBALS['current_theme_template'];
}

// Contact Form 7 remove auto added p tags
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('carbon_fields_sanitize_rich_text', function ($value) {
	return $value; // Сохраняем как есть, без wp_kses_post
});


## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter('get_the_archive_title', function ($title) {
	return preg_replace('~^[^:]+: ~', '', $title);
});
