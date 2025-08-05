<?php

function site_breadcrumbs()
{
    $page_num = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $separator = ' <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
      <path d="M11.269 9.207L15.4761 5L11.269 0.792999L10.5619 1.50012L13.5619 4.50003L0.499949 4.50003L0.499949 5.50003L13.5618 5.50003L10.5619 8.49987L11.269 9.207Z" fill="white"/>
    </svg> ';

    if (is_front_page()) {
        if ($page_num > 1) {
            echo '<a href="' . site_url() . '">Home</a>' . $separator . $page_num . '-page';
        } else {
            echo 'Вы находитесь на главной странице';
        }
    } else {
        echo '<a href="' . site_url() . '">Home</a>' . $separator;

        // Универсально для записей любых типов
        if (is_singular()) {
            $post_type = get_post_type();
            $post_type_obj = get_post_type_object($post_type);

            // Если это не обычный пост, а CPT
            if ($post_type !== 'post' && $post_type_obj && $post_type_obj->has_archive) {
                echo '<a href="' . get_post_type_archive_link($post_type) . '">' . esc_html($post_type_obj->labels->name) . '</a>' . $separator;
            } elseif ($post_type === 'post') {
                //the_category(', ');
                //echo $separator;
            }

            // Автоматический вывод таксономий, привязанных к CPT
            $taxonomies = get_object_taxonomies($post_type);
            foreach ($taxonomies as $taxonomy) {
                $terms = get_the_terms(get_the_ID(), $taxonomy);
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        echo '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a>' . $separator;
                        // Показываем только первую таксономию
                        break 2;
                    }
                }
            }

            the_title();

        } elseif (is_post_type_archive()) {
            $post_type = get_post_type();
            $post_type_obj = get_post_type_object($post_type);
            echo esc_html($post_type_obj->labels->name);

        } elseif (is_tax()) {
            $term = get_queried_object();
            if ($term) {
                $taxonomy = get_taxonomy($term->taxonomy);
                // Пытаемся определить связанный тип записи (если есть)
                if (!empty($taxonomy->object_type)) {
                    $post_type = $taxonomy->object_type[0];
                    $post_type_obj = get_post_type_object($post_type);
                    if ($post_type_obj && $post_type_obj->has_archive) {
                        echo '<a href="' . get_post_type_archive_link($post_type) . '">' . esc_html($post_type_obj->labels->name) . '</a>' . $separator;
                    }
                }
                echo esc_html($term->name);
            }

        } elseif (is_page()) {
            the_title();

        } elseif (is_tag()) {
            single_tag_title();

        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $separator;
            echo get_the_time('d');

        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo get_the_time('F');

        } elseif (is_year()) {
            echo get_the_time('Y');

        } elseif (is_author()) {
            $userdata = get_userdata(get_query_var('author'));
            echo 'Опубликовал(а) ' . esc_html($userdata->display_name);

        } elseif (is_404()) {
            echo 'Error 404';
        }

        if ($page_num > 1) {
            echo ' (' . $page_num . '-page)';
        }
    }
}