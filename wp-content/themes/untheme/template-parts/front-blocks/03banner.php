<?php

if ($banner_content = carbon_get_theme_option('crb_banner_text')) {

    $banner_bg = carbon_get_theme_option('crb_banner_bg');
    $banner_form = carbon_get_theme_option('crb_association_forms');
?>
    <?php if (!empty($banner_bg)) {
        $banner_bg_url = wp_get_attachment_image_url($banner_bg, 'full');

        $banner_background = 'style=" background-image:url(' . $banner_bg_url . '); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;"';
    }

    ?>
    <section class="section-banner" <?php echo $banner_background ?>>
        <div class="fixed-container">
            <div class="section-banner__inner">
                <div class="banner-content">
                    <?php echo $banner_content ?>
                </div>

                <?php
                if (!empty($banner_form) && isset($banner_form[0]['id'])) {
                    echo do_shortcode('[contact-form-7 id="' . esc_attr($banner_form[0]['id']) . '"]');
                }
                ?>
            </div>
        </div>
    </section>
<?php
}

?>