<?php

// Регистрируем скрипт + локализацию
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script(
        'ajax-blocks',
        get_stylesheet_directory_uri() . '/js/ajax-blocks.js',
        ['jquery'],
        '1.0',
        true
    );

    wp_localize_script('ajax-blocks', 'ajaxBlocksData', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('load_blocks_nonce'),
    ]);
});



add_action('wp_ajax_load_blocks', 'mytheme_load_gutenberg_blocks');
add_action('wp_ajax_nopriv_load_blocks', 'mytheme_load_gutenberg_blocks');

function mytheme_load_gutenberg_blocks()
{

    check_ajax_referer('load_blocks_nonce', 'nonce');

    // какие блоки разрешены подгружать
    $allowed = [
        'hero',
        'text-description',
        'products',
        'advantages',
        'projects-gallery',
        'reviews1',
        'profiles-types',
        'types',
        'construction',
        'main-form',
        'info-block',
        'order-block',
        'about',
        'cover',
        'cover2',
        'info-block2'
    ];

    $blocks_to_load = isset($_POST['blocks']) ? (array) $_POST['blocks'] : [];
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    if (!$post_id) {
        wp_send_json_error(['msg' => 'post_id не передан']);
    }

    $content = get_post_field('post_content', $post_id);

    // Разбираем контент на массив блоков
    $parsed = parse_blocks($content);

    ob_start();

    foreach ($parsed as $block) {

        // Например, блок hero будет иметь имя вида: theme/hero или acf/hero
        // потому мы сверяем по части имени
        foreach ($blocks_to_load as $requested) {

            $requested = sanitize_key($requested);

            if (!in_array($requested, $allowed, true)) {
                continue;
            }

            if (strpos($block['blockName'], $requested) !== false) {
                echo render_block($block);
            }
        }
    }

    $html = ob_get_clean();

    wp_send_json_success([
        'html' => $html,
    ]);
}
