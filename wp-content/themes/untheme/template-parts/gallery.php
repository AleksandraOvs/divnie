<section class="section-gallery">
    <div class="fixed-container">

    <h2 class="title">Галерея проектов</h2>
<?php
    $gallery_description = carbon_get_theme_option('crb_gallery_description');
    if (!empty($gallery_description)){
        echo '<div class="description">'.$gallery_description.'</div>';
    }
    ?>

        <?php
        $selected_terms = carbon_get_theme_option('crb_gallery_categories');

        if ($selected_terms) {
            $term_ids = wp_list_pluck($selected_terms, 'id'); // массив ID категорий

            $query = new WP_Query(array(
                'post_type'      => 'pgallery',
                'posts_per_page' => -1,
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'gallery-cat',
                        'field'    => 'term_id',
                        'terms'    => $term_ids,
                    ),
                ),
            ));

            // echo '<pre>';
            // print_r($query);

            if ($query->have_posts()) : ?>
                <div class="projects-grid">
                    <?php while ($query->have_posts()) : $query->the_post();
                        $gallery = carbon_get_post_meta(get_the_ID(), 'gallery_images');
                        if (!$gallery) continue;
                    ?>
                        <div class="project-item">
                            <h3><?php the_title(); ?></h3>

                            <!-- Swiper слайдер -->
                            <div class="swiper project-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($gallery as $index => $img) : ?>
                                        <div class="swiper-slide">
                                            <a href="<?php echo esc_url($img['image']); ?>"
                                                data-fancybox="project-<?php the_ID(); ?>"
                                                data-caption="<?php echo esc_attr(get_the_title()); ?>">
                                                <img src="<?php echo esc_url($img['image']); ?>" alt="<?php the_title(); ?>">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <!-- Навигация -->
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
        <?php endif;
        }
        ?>
    </div>
</section>