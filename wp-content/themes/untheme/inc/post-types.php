<?php

add_action( 'init', 'register_post_types' );

	function register_post_types(){
	
		register_post_type( 'services', [
			'label'  => null,
			'labels' => [
				'name'               => 'Services', // основное название для типа записи
				'singular_name'      => 'Service', // название для одной записи этого типа
				'add_new'            => 'Add Service', // для добавления новой записи
				'add_new_item'       => 'Adding Service', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Edit Service', // для редактирования типа записи
				'new_item'           => 'New Service', // текст новой записи
				'view_item'          => 'Go to Service', // для просмотра записи этого типа.
				'search_items'       => 'Search Service', // для поиска по этим типам записи
				'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Not found', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Services', // название меню
			],
			'description'            => '',
			'public'                 => true,
			// 'publicly_queryable'  => null, // зависит от public
			// 'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'           => true, // показывать ли в меню админки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => false, // $post_type. C WP 4.7
			'menu_position'       => 2,
			'menu_icon'           => 'dashicons-hammer',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => true,
			'supports'            => [ 'title','thumbnail', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			//'taxonomies'          => ['post_tag'],
			'has_archive'         => true,
			//'rewrite'             => true,
			'rewrite' => [
    'slug' => 'services',
    'with_front' => false,
],
			'query_var'           => 'services',
		] );

		register_post_type( 'portfolio', [
			'label'  => null,
			'labels' => [
				'name'               => 'Наши ТВ-проекты', // основное название для типа записи
				'singular_name'      => 'TV проекты', // название для одной записи этого типа
				'add_new'            => 'Add Project', // для добавления новой записи
				'add_new_item'       => 'Adding Project', // заголовка у вновь создаваемой записи в админ-панели.
				'edit_item'          => 'Edit Project', // для редактирования типа записи
				'new_item'           => 'New Project', // текст новой записи
				'view_item'          => 'Go to Project', // для просмотра записи этого типа.
				'search_items'       => 'Search Project', // для поиска по этим типам записи
				'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
				'not_found_in_trash' => 'Not found', // если не было найдено в корзине
				'parent_item_colon'  => '', // для родителей (у древовидных типов)
				'menu_name'          => 'Projects', // название меню
			],
			'description'            => '',
			'public'                 => true,
			// 'publicly_queryable'  => null, // зависит от public
			// 'exclude_from_search' => null, // зависит от public
			// 'show_ui'             => null, // зависит от public
			// 'show_in_nav_menus'   => null, // зависит от public
			'show_in_menu'           => true, // показывать ли в меню админки
			// 'show_in_admin_bar'   => null, // зависит от show_in_menu
			'show_in_rest'        => true, // добавить в REST API. C WP 4.7
			'rest_base'           => false, // $post_type. C WP 4.7
			'menu_position'       => 3,
			'menu_icon'           => 'dashicons-format-gallery',
			//'capability_type'   => 'post',
			//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
			//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
			'hierarchical'        => true,
			'supports'            => [ 'title','thumbnail', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
			//'taxonomies'          => ['post_tag'],
			'has_archive'         => true,
			'rewrite'             => true,
			'query_var'           => 'portfolio',
		] );
	}