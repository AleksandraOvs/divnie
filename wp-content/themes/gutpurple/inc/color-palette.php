
<?php
function mytheme_gutenberg_color_palette()
{

	// ✅ Добавляем свои цвета
	add_theme_support('editor-color-palette', [
		[
			'name'  => 'Black',
			'slug'  => 'black',
			'color'	=> '#000000',
		],
		[
			'name'  => 'Dark grey',
			'slug'  => 'dark-grey',
			'color'	=> '#464451',
		],
		[
			'name'  => 'Accent',
			'slug'  => 'accent',
			'color' => '#4D70C9',
		],
		[
			'name'  => 'Blue',
			'slug'  => 'blue',
			'color' => '#A1DEFF',

		],
		[
			'name'	=> 'Light Grey',
			'slug'	=> 'light-grey',
			'color'	=> '#f5f5f5',
		]
	]);

	// ✅ Разрешаем пользователю выбирать любые цвета
	add_theme_support('disable-custom-colors', false);
}
add_action('after_setup_theme', 'mytheme_gutenberg_color_palette');


add_theme_support('editor-gradient-presets', [
	[
		'name'     => __('Синий градиент', 'mytheme'),
		'gradient' => 'linear-gradient(135deg, #0073e6 0%, #00c4ff 100%)',
		'slug'     => 'blue-gradient',
	],
]);
add_theme_support('disable-custom-gradients', false);


function mytheme_editor_color_variables()
{
	// ✅ Твоя палитра цветов
	$colors = [
		'black'      => '#000000',
		'dark-grey'  => '#464451',
		'accent'     => '#4D70C9',
		'blue'       => '#A1DEFF',
		'light-grey' => '#f5f5f5',
	];

	// ✅ Генерируем CSS-переменные для :root
	$custom_css = ':root {' . "\n";
	foreach ($colors as $slug => $color) {
		$custom_css .= "--wp--preset--color--{$slug}: {$color};\n";
	}
	$custom_css .= '}';

	// ✅ Подключаем стили на фронтенде и в редакторе
	wp_add_inline_style('wp-block-library', $custom_css);
	wp_add_inline_style('mytheme-style', $custom_css); // поменяй 'mytheme-style' на хэндл твоей темы
}
add_action('wp_enqueue_scripts', 'mytheme_editor_color_variables');
add_action('admin_enqueue_scripts', 'mytheme_editor_color_variables');
