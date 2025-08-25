<?php
$win_types = carbon_get_theme_option('crb_windows_types');
if ($win_types) :
?>

    <section class="types-windows__section">
        <div class="fixed-container">
            <?php
            // Заголовок блока
            $win_head = carbon_get_theme_option('crb_windows_types_head');
            if ($win_head) {
                echo '<h2 class="title">' . esc_html($win_head) . '</h2>';
            }

            // Описание блока
            $win_desc = carbon_get_theme_option('crb_windows_types_desc');
            if ($win_desc) {
                echo '<div class="description">' . apply_filters('the_content', $win_desc) . '</div>';
            }

            // Виды окон (complex)

            ?>
            <div class="windows-types swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($win_types as $item) :
                        $img_id  = $item['crb_window_type_img'];
                        $alt     = $item['crb_window_type_alt'];
                        $img_url = wp_get_attachment_image_url($img_id, 'large');
                        $thumb   = wp_get_attachment_image($img_id, 'medium', false, array('alt' => esc_attr($alt)));
                    ?>
                        <div class="windows-types__slide swiper-slide">
                            <a href="<?php echo esc_url($img_url); ?>" data-fancybox="windows-types" data-caption="<?php echo esc_attr($alt); ?>">
                                <?php echo $thumb; ?>
                            </a>
                            <?php if ($alt) : ?>
                                <div class="window-type__alt"><?php echo esc_html($alt); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Стрелки управления -->
                <!-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> -->

                <!-- Пагинация -->
                <div class="swiper-pagination"></div>
            </div>
        <?php endif; ?>
        </div>
    </section>