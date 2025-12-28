<?php

/**
 * КОЛОНКА "Шаблон"
 */

// 1) добавляем колонку
add_filter('manage_pages_columns', function ($columns) {
    $columns['template_page'] = 'Шаблон';
    return $columns;
});

// 2) выводим название шаблона
add_action('manage_pages_custom_column', function ($column, $post_id) {

    if ($column !== 'template_page') {
        return;
    }

    $template = carbon_get_post_meta($post_id, 'template_page');

    if (empty($template) || empty($template[0]['value'])) {
        echo '<span style="color:#999;">— не выбран —</span>';
        return;
    }

    $template_id = intval($template[0]['value']);
    $post = get_post($template_id);

    if ($post) {
        echo esc_html($post->post_title);
    } else {
        echo '<span style="color:#c00;">(шаблон не найден)</span>';
    }
}, 10, 2);


/**
 * МАССОВОЕ РЕДАКТИРОВАНИЕ
 */

// форма в “массовом редактировании”
add_action('bulk_edit_custom_box', function ($column_name, $post_type) {

    if ($post_type !== 'page') {
        return;
    }

    if ($column_name !== 'template_page') {
        return;
    }

    $templates = get_posts([
        'post_type'      => 'custom_template',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
    ]);
?>

    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label class="alignleft">
                <span class="title">Шаблон страницы</span>
                <select name="template_page_id">
                    <option value="">— не изменять —</option>

                    <?php foreach ($templates as $t): ?>
                        <option value="<?php echo $t->ID; ?>">
                            <?php echo esc_html($t->post_title); ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </label>
        </div>
    </fieldset>

<?php
}, 10, 2);


// сохранение при массовом редактировании
add_action('save_post_page', function ($post_id) {

    // только если реально пришло поле
    if (!isset($_REQUEST['template_page_id'])) {
        return;
    }

    // “не изменять”
    if ($_REQUEST['template_page_id'] === '') {
        return;
    }

    $template_id = intval($_REQUEST['template_page_id']);

    // формат под Association
    carbon_set_post_meta(
        $post_id,
        'template_page',
        [
            [
                'value' => $template_id,
            ],
        ]
    );
}, 20);
