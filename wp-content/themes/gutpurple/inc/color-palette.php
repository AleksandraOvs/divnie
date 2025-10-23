
<?php
add_action( 'after_setup_theme', 'set_color_palette' );
 
function set_color_palette(){
	add_theme_support( 
		'editor-color-palette', 
		array(
			array(
				'name'  => 'Main color',
				'slug'  => 'black',
				'color'	=> '#000000',
			),
			array(
				'name'  => 'Dark color',
				'slug'  => 'dark',
				'color'	=> '#464451',
			),
			array(
				'name'  => 'Accent',
				'slug'  => 'accent',
				'color' => '#4D70C9',
			),
			array(
				'name'  => 'Blue',
				'slug'  => 'blue',
				'color' => '#A1DEFF',
			),
			array(
				'name'	=> 'Light Grey',
				'slug'	=> 'light-grey',
				'color'	=> '#f5f5f5',
			),
		)
	);
}

add_theme_support( 'disable-custom-colors' );