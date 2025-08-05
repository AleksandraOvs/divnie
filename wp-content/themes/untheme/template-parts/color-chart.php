<?php
$color_chart = carbon_get_post_meta(get_the_ID(), 'crb_color_chart');
$color_chart_head = carbon_get_post_meta(get_the_ID(), 'crb_cc_heading');
$color_chart_description = carbon_get_post_meta(get_the_ID(), 'crb_cc_desc');
?>

<?php if (!empty($color_chart)) {
?>
    <section class="color-chart-section">
	<div class="fixed-container">
        <div class="color-chart-section__inner">
            <?php
            if (!empty($color_chart_head)) {
                echo '<h2 class="title">' . $color_chart_head . '</h2>';
            }
            ?>

            <?php
            if (!empty($color_chart_description)) {
                echo '<div class="section-description">' . $color_chart_description . '</div>';
            }
            ?>
        </div>


        <ul class="color-chart">
            <?php
            foreach ($color_chart as $color) {
                $swatch_pic_color = wp_get_attachment_image_url($color['crb_color_pic'], 'full');
            ?>
                <li class="color-chart__item">
                    <?php
                    if (!empty($color['crb_color']) ) {
                    ?>
                        <div class="color-chart__item__swatch" style="background:<?php echo $color['crb_color'] ?>;">

                        </div>
                    <?php
                    }else {
						
					}

                    if (!empty($color['crb_color_pic'])) {

                    ?>
                        <div class="color-chart__item__swatch" style="background:#fff;">
                            <img class="color-swatch-img" src="<?php echo $swatch_pic_color ?>" alt="color swatch" />
                        </div>
                    <?php
                    }
                    ?>

                    <p class="color-chart__item__name"><?php echo $color['crb_color_name'] ?></p>
                </li>
            <?php
            }
            ?>
        </ul>


	</div>
    </section>
<?php
}

