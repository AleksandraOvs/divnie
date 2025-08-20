<?php

add_action('init', 'register_post_types');

function register_post_types()
{

	register_post_type('pgallery', [
		'label'  => null,
		'labels' => [
			'name'               => 'Галерея проектов',
			'singular_name'      => 'Проект',
			'add_new'            => 'Добавить проект',
			'add_new_item'       => 'Добавление проекта',
			'edit_item'          => 'Редактировать проект',
			'new_item'           => 'Новый проект',
			'view_item'          => 'Перейти',
			'search_items'       => 'Искать',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Галерея проектов',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true,
		'show_in_rest'           => true,
		'rest_base'              => false,
		'menu_position'          => 2,
		'menu_icon'              => 'dashicons-hammer',
		'hierarchical'           => true,
		'supports'               => ['title'],
		'taxonomies'             => ['gallery-cat'], // привязка таксономии
		'has_archive'            => true,
		'rewrite' => [
			'slug'       => 'gallery',
			'with_front' => false,
		],
		'query_var'              => 'pgallery',
	]);

	register_post_type('portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Наши ТВ-проекты',
			'singular_name'      => 'TV проект',
			'add_new'            => 'Add Project',
			'add_new_item'       => 'Adding Project',
			'edit_item'          => 'Edit Project',
			'new_item'           => 'New Project',
			'view_item'          => 'Go to Project',
			'search_items'       => 'Search Project',
			'not_found'          => 'Not found',
			'not_found_in_trash' => 'Not found',
			'parent_item_colon'  => '',
			'menu_name'          => 'Projects',
		],
		'description'            => '',
		'public'                 => true,
		'show_in_menu'           => true,
		'show_in_rest'           => true,
		'rest_base'              => false,
		'menu_position'          => 3,
		'menu_icon'              => 'dashicons-format-gallery',
		'hierarchical'           => true,
		'supports'               => ['title', 'thumbnail', 'editor'],
		'has_archive'            => true,
		'rewrite'                => true,
		'query_var'              => 'portfolio',
	]);
}

/**
 * Регистрируем таксономию для галереи
 */
add_action('init', function () {
	register_taxonomy('gallery-cat', ['pgallery'], [
		'labels' => [
			'name'              => 'Категории галереи',
			'singular_name'     => 'Категория галереи',
			'search_items'      => 'Поиск категорий',
			'all_items'         => 'Все категории',
			'parent_item'       => 'Родительская категория',
			'parent_item_colon' => 'Родительская категория:',
			'edit_item'         => 'Редактировать категорию',
			'update_item'       => 'Обновить категорию',
			'add_new_item'      => 'Добавить категорию',
			'new_item_name'     => 'Название новой категории',
			'menu_name'         => 'Категории галереи',
		],
		'public'            => true,
		'hierarchical'      => true, // древовидные, как обычные категории
		'show_ui'           => true,
		'show_in_menu'      => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true, // поддержка Gutenberg и REST API
		'rewrite'           => ['slug' => 'gallery-category'],
	]);
});

// Добавляем столбец в список проектов
add_filter('manage_pgallery_posts_columns', function ($columns) {
	$columns['gallery_cat'] = 'Категории галереи';
	return $columns;
});

// Выводим содержимое столбца
add_action('manage_pgallery_posts_custom_column', function ($column, $post_id) {
	if ($column === 'gallery_cat') {
		$terms = get_the_term_list($post_id, 'gallery-cat', '', ', ');
		echo $terms ? $terms : '—';
	}
}, 10, 2);
