<?php
function add_categories_to_pages() {
    register_taxonomy_for_object_type('category', 'page');
}
add_action('init', 'add_categories_to_pages');

// Добавляем новую колонку "Шаблон" в таблицу страниц
add_filter('manage_page_posts_columns', 'add_template_name_column', 4);
function add_template_name_column($columns)
{
	$num = 2; // позиция для вставки

	$new_columns = [
		'template_name' => 'Шаблон',
	];

	return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
}

// Заполняем колонку названием шаблона
add_action('manage_page_posts_custom_column', 'fill_template_name_column', 5, 2);
function fill_template_name_column($colname, $post_id)
{
	if ($colname === 'template_name') {
		$template = get_post_meta($post_id, '_wp_page_template', true);

		if ($template === 'default') {
			echo 'По умолчанию';
			return;
		}

		// Получаем все зарегистрированные шаблоны для страниц
		$templates = wp_get_theme()->get_page_templates();

		// Ищем читаемое название по имени файла
		$name = array_search($template, $templates);

		echo $name ? esc_html($name) : esc_html($template);
	}
}
