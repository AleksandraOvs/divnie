<section class="section-list">
    <div class="fixed-container">
        <?php
        // Заголовок блока
        $construction_head = carbon_get_theme_option('crb_construction_head');
        if ($construction_head) {
            echo '<h2 class="title">' . esc_html($construction_head) . '</h2>';
        }

        // Описание блока
        $construction_desc = carbon_get_theme_option('crb_construction_desc');
        if ($construction_desc) {
            echo '<div class="description">' . apply_filters('the_content', $construction_desc) . '</div>';
        }

        // Список элементов
        $items = carbon_get_theme_option('crb_construction_items');
        if ($items) :
            echo '<ul class="icons-list">';
            foreach ($items as $item) {
                $icon_id  = $item['crb_item_icon'];
                $icon_url = wp_get_attachment_image_url($icon_id, 'thumbnail');
                $text     = $item['crb_item_text'];

                echo '<li class="icons-list__item">';
                echo '<div class="icon">';
                    if ($icon_url) {
                        echo '<img src="' . esc_url($icon_url) . '" alt="">';
                    }
                echo '</div>'; //.icon
                    if ($text) {
                        echo '<p class="text">' . esc_html($text) . '</p>';
                    }
                echo '</li>';
            }
            echo '</ul>';
        endif;
        ?>

        <?php 

        $summary_text = carbon_get_theme_option('crb_icon_text_summary');
        if (!empty( $summary_text)){
            echo '<div class="accent-text">'.$summary_text.'</div>';
        }

        ?>
    </div>
</section>