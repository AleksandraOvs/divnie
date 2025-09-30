<section class="adv-section _wsills-adv">
    <div class="fixed-container">
        <?php
        // Получаем список преимуществ
        $adv_block_text = carbon_get_theme_option('crb_wsills_adv_block_text');
        $advantages_col1 = carbon_get_theme_option('crb_wsills_adv_text_left');
        $advantages_col2 = carbon_get_theme_option('crb_wsills_adv_text_right');

        $adv_block_head = carbon_get_theme_option('crb_wsills_adv_block_head');

        if (!empty($adv_block_head)) : ?>
            <h2 class="title"><?php echo esc_html($adv_block_head); ?></h2>
        <?php endif; ?>


        <?php
        if (!empty($adv_block_text)) : ?>
            <div class="_cottages-adv__text"><?php echo $adv_block_text; ?></div>
        <?php endif; ?>

        <div class="_cottages-adv__inner">
            <?php
            if (!empty($advantages_col1)) : ?>
                <div class="adv-text__left toRight">
                    <?php echo $advantages_col1 ?>
                </div>
            <?php endif; ?>

            <?php
            if (!empty($advantages_col2)) : ?>
                <div class="adv-text__right toLeft">
                    <?php echo $advantages_col2 ?>
                </div>
            <?php endif; ?>

        </div>

        <?php if (carbon_get_theme_option('crb_wsills_about_heading')) : ?>
            <h2 class="title">
                <?php echo esc_html(carbon_get_theme_option('crb_wsills_about_heading')); ?>
            </h2>
        <?php endif; ?>

        <?php if (carbon_get_theme_option('crb_wsills_about_desc')) : ?>
            <div class="description">
                <?php echo wpautop(esc_html(carbon_get_theme_option('crb_wsills_about_desc'))); ?>
            </div>
        <?php endif; ?>

        <?php
        $items = carbon_get_theme_option('crb_wsills_about_items');
        if (! empty($items)) : ?>
            <div class="about-items ">
                <?php foreach ($items as $item) :
                    $img_id = $item['crb_wsills_about_img'];
                    $img_url = wp_get_attachment_image_url($img_id, 'full');
                    $text    = $item['crb_wsills_about_text'];
                ?>
                    <div class="about-item fromBottom">
                        <?php if ($img_url) : ?>
                            <div class="about-item__image">
                                <img src="<?php echo esc_url($img_url); ?>" alt="">
                            </div>
                        <?php endif; ?>

                        <?php if ($text) : ?>
                            <div class="about-item__text">
                                <?php echo $text ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php
        // Получаем список преимуществ
        $advantages = carbon_get_theme_option('crb_wsadv');

        if (!empty($advantages) && is_array($advantages)) : ?>


            <div class="advantages-list">
                <?php foreach ($advantages as $adv) : ?>
                    <?php
                    // если всё пустое — пропускаем
                    if (empty($adv['crb_wsadv_icon']) && empty($adv['crb_wadv_head']) && empty($adv['crb_adv_desc'])) {
                        continue;
                    }
                    ?>
                    <div class="advantage-item">
                        <?php if (!empty($adv['crb_wsadv_icon'])) : ?>
                            <?php $icon_url = wp_get_attachment_image_url($adv['crb_wsadv_icon'], 'thumbnail'); ?>
                            <?php if ($icon_url) : ?>
                                <div class="advantage-icon">
                                    <img src="<?php echo esc_url($icon_url); ?>" alt="">
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!empty($adv['crb_wsadv_head'])) : ?>
                            <h3 class="advantage-head"><?php echo esc_html($adv['crb_wsadv_head']); ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($adv['crb_wsadv_desc'])) : ?>
                            <div class="advantage-desc">
                                <?php echo wp_kses_post($adv['crb_wsadv_desc']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>


        <?php endif; ?>


    </div>


</section>