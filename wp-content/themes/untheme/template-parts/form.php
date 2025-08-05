<?php

if ($shortcode = carbon_get_theme_option('crb_fdb_shortcode')) {

    $form_head = carbon_get_post_meta(get_the_ID(), 'crb_feedback_heading');
    $form_desc = carbon_get_post_meta(get_the_ID(), 'crb_feedback_desc');
?>

    <div class="feedback-form">
        <?php
        if (!empty($form_head)) {
            echo '<h3>' . $form_head . '</h3>';
        }

        if (!empty($form_desc)) {
            echo '<div class="form-description">' . $form_desc . '</div>';
        }

        ?>
        <?php echo do_shortcode(" $shortcode "); ?>
    </div>

    <?php 
        $badges = carbon_get_theme_option('crb_trust_badges');
        if (!empty($badges)){
            
            echo '<ul class="badges-list">';
            foreach ($badges as $badge){
                $badge_url = wp_get_attachment_image_url($badge['crb_badge'], 'medium');
                echo '<li>';
                echo '<img src="'.$badge_url.'" alt="trust-badge" />';
                echo '</li>';
            }
            echo '</ul>';
        }
    ?>

<?php
}

?>