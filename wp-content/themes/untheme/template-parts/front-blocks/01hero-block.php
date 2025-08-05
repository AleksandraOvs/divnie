<section class="hero-section">

    <?php
    $slides = carbon_get_the_post_meta('crb_hero_slides');

    if ($slides) : ?>
        <div class="swiper hero-slider">
            <div class="swiper-wrapper hero-slider__wrapper">
                <?php foreach ($slides as $slide) : ?>
                    <div class="swiper-slide hero-slider__slide">
                        <picture>
                            <?php if (!empty($slide['crb_hero_img_mob'])) : ?>
                                <source media="(max-width: 767px)" srcset="<?= wp_get_attachment_image_url($slide['crb_hero_img_mob'], 'full'); ?>">
                            <?php endif; ?>
                            <?php if (!empty($slide['crb_hero_img'])) : ?>
                                <img src="<?= wp_get_attachment_image_url($slide['crb_hero_img'], 'full'); ?>" alt="">
                            <?php endif; ?>
                        </picture>

                        <div class="hero-slide-content">
                            <div class="fixed-container">
                                <div class="hero-slide-content__left">
                                    <?php if (!empty($slide['crb_hero_content_heading'])) : ?>
                                        <h1><?php echo $slide['crb_hero_content_heading'] ?></h1>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['crb_hero_content_desc'])) : ?>
                                        <div class="slide-desc"><?= apply_filters('the_content', $slide['crb_hero_content_desc']); ?></div>
                                    <?php endif; ?>


                                    <?php if (!empty($slide['crb_hero_content_link']) && !empty($slide['crb_hero_content_link_text'])) : ?>
                                        <a href="<?= esc_url($slide['crb_hero_content_link']); ?>" class="btn">
                                            <?= esc_html($slide['crb_hero_content_link_text']); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <div class="hero-slide-content__right">
                                    <?php
                                    if (carbon_get_post_meta(get_the_ID(), 'crb_show_form_on_hero')) {
                                        get_template_part('template-parts/form');
                                    }
                                    ?>
                                </div>


                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
            <div class="slider-pagination"></div>
            
        </div>
    <?php endif; ?>

</section>