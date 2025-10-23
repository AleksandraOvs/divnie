<?php

/**
 * Title: Блок и слайдер
 * Slug: tours/block-slider
 * Categories: featured, banner
 * Description: Блок и слайдер на Swiper через колонки.
 */
?>

<!-- wp:cover {"dimRatio":50,"align":"full"} -->
<div class="wp-block-cover alignfull">
    <span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span>
    <div class="wp-block-cover__inner-container">

        <!-- wp:heading {"textAlign":"center","level":1} -->
        <h1 class="has-text-align-center">Заголовок</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">Краткое описание (подзаголовок).</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
        <div class="wp-block-buttons">
            <!-- wp:button -->
            <div class="wp-block-button">
                <a class="wp-block-button__link">Подробнее</a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

        <!-- wp:group {"className":"swiper block-slider "} -->
        <div class="wp-block-group swiper block-slider ">

            <!-- wp:columns {"className":"swiper-wrapper"} -->
            <div class="wp-block-columns swiper-wrapper">

                <!-- wp:column {"className":"swiper-slide block-slider-item"} -->
                <div class="wp-block-column swiper-slide block-slider-item">
                    <!-- wp:image -->
                    <figure class="wp-block-image"><img src="" alt=""></figure>
                    <!-- /wp:image -->
                    <!-- wp:heading {"level":3} -->
                    <h3>Заголовок 1</h3>
                    <!-- /wp:heading -->
                    <!-- wp:paragraph -->
                    <p>Описание 1</p>
                    <!-- /wp:paragraph -->
                </div>
                <!-- /wp:column -->


            </div>
            <!-- /wp:columns -->

        </div>
        <!-- /wp:group -->

    </div>
</div>
<!-- /wp:cover -->