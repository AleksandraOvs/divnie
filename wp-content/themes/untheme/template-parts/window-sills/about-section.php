<section class="section-about">
    <div class="fixed-container">
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
    </div>
</section>