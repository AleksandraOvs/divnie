<?php
if (carbon_get_theme_option('crb_show-form-block')) {
?>
    <section class="section-form fromOpacity">
        <?php
        $form_background_url = wp_get_attachment_image_url(carbon_get_theme_option('crb_form-block_image'), 'full');

        if (!empty($form_background_url)) {
            echo '<img class="form-background" src="' . $form_background_url . '" alt="Contact us" />';
        }
        ?>
        <div class="fixed-container">
            <div class="section-form__inner">
                <?php

                $form_heading = carbon_get_theme_option('crb_form-block_heading');
                $form_description = carbon_get_theme_option('crb_form-block_desc');
                ?>

                <?php
                if (!empty($form_heading)) {
                    echo '<h2 class="title">' . $form_heading . '</h2>';
                }
                ?>

                <?php
                if (!empty($form_description)) {
                    echo '<div class="form-description">' . $form_description . '</div>';
                }
                ?>
                <?php get_template_part('template-parts/form'); ?>
            </div>

        </div>
    </section>


<?php } ?>