<?php
$heading = carbon_get_post_meta(get_the_ID(), 'crb_why_heading');
$why_items = carbon_get_post_meta(get_the_ID(), 'crb_why_items');
$why_text_content = carbon_get_post_meta(get_the_ID(), 'crb_text_content');
?>

<section class="section-why">
    <div class="fixed-container">
        <?php
        if (!empty($heading)) {
            echo '<h2 class="title fromTop">' . $heading . '</h2>';
        }
        ?>

        <?php if (!empty($why_items)) { ?>
            <div class="section-why__inner">
                <ul class="why-list">
                    <?php
                    foreach ($why_items as $why_item){
                        $why_item_icon = wp_get_attachment_image_url($why_item['crb_why_icon'], 'full');
                        echo '<li>';
                        echo '<div class="why-list__icon"><img src="'.$why_item_icon.'" alt="Why Choose Our Gutter Experts" /></div>';
                        if (!empty($why_item['crb_why_text'])){
                            echo '<p>'.$why_item['crb_why_text'].'</p>';
                        }
                        echo '</li>';

                    }
                    ?>
                </ul>
            </div>

        <?php } ?>

        <?php
        if (!empty($why_text_content)){
            echo '<div class="why-section__text-content">'.$why_text_content.'</div>';
        }
        ?>
    </div>
</section>