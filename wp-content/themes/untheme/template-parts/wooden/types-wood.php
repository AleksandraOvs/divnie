<?php

$types = carbon_get_theme_option('crb_types');
if ($types) {

?>
    <section class="wood-types-section">
        <div class="fixed-container">
        <?php
        // Заголовок блока
        $types_head = carbon_get_theme_option('crb_types_head');
        if ($types_head) {
            echo '<h2 class="title">' . esc_html($types_head) . '</h2>';
        }

        // Описание блока
        $types_desc = carbon_get_theme_option('crb_types_desc');
        if ($types_desc) {
            echo '<div class="description">' . apply_filters('the_content', $types_desc) . '</div>';
        }

        // Виды профилей (complex field)
        echo '<div class="types-list">';
        foreach ($types as $type) {
            $img       = wp_get_attachment_image($type['crb_type_img'], 'medium');
            $head      = $type['crb_type_head'];
            $desc      = $type['crb_type_desc'];
            $price     = $type['crb_type_price'];
            $link      = $type['crb_type_link'];
            $link_text = $type['crb_type_link_text'];

            echo '<div class="type-item">';

          

           
            if ($img) {
                echo '<div class="type-img">' . $img . '</div>';
            }


            echo '<div class="type-item__content__about">';
            if ($head) {
                echo '<h3 class="type-head">' . esc_html($head) . '</h3>';
            }
            if ($desc) {
                echo '<div class="type-desc">' . apply_filters('the_content', $desc) . '</div>';
            }


            echo '<div class="type-item__content__about__price">';
            if ($price) {
                echo '<div class="type-price">' . apply_filters('the_content', $price) . '</div>';
            }
            if ($link && $link_text) {
                echo '<div class="type-link"><a href="' . esc_url($link) . '" class="btn">' . esc_html($link_text) . '</a></div>';
            }

            echo '</div>'; //price

            echo '</div>'; //about

            echo '</div>'; //type-item
        }
        echo '</div>';
    }
        ?>
        </div>
    </section>