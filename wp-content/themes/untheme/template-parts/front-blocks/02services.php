<section class="section-services">
    <div class="fixed-container">
        <div class="section-services__inner">
            <div class="section-services__inner__left">
                <?php
                $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'ASC'
                );

                $services_query = new WP_Query($args);

                //echo '<pre>';
                //print_r($post_type);

                if ($services_query->have_posts()) : ?>
                    <div class="services-list">
                        <?php

                        if ($service_heading = carbon_get_post_meta(get_the_ID(), 'crb_services_head')) {

                            echo '<div class="services-list__item fromOpacity"><h2 class="title">' . $service_heading . '</h2></div>';
                        }
                        ?>

                        <?php while ($services_query->have_posts()) : $services_query->the_post(); ?>
                            <div class="services-list__item fromOpacity">
                                <div class="service-item__content">
                                    <h3 class="service-title">
                                        <?php the_title(); ?>
                                    </h3>

                                    <?php 
                                    $service_description = carbon_get_post_meta(get_the_ID(), 'crb_service_description');

                                    if (!empty($service_description)){
                                        ?>
                                        <div class="service-description">
                                            <?php echo $service_description ?>
                                        </div>
                                        <?php
                                    }


                                    ?>

                                    <a href="<?php the_permalink() ?>" class="btn">Go to Service page</a>
                                </div>
                                <?php //if (has_post_thumbnail()) : 
                                ?>
                                <!-- <div class="service-thumbnail">

                                        <?php //the_post_thumbnail('medium'); 
                                        ?>

                                    </div> -->
                                <?php //endif; 
                                ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <p>Nothing found</p>
                <?php endif; ?>

                <?php
                $services_block_summary = carbon_get_post_meta(get_the_ID(), 'crb_services_summary');

                if (!empty($services_block_summary)){
                    echo '<div class="services-summary">'.$services_block_summary.'</div>';
                }
                ?>
            </div>

            <div class="section-services__inner__right">
                <?php
                $services_text = carbon_get_post_meta(get_the_ID(), 'crb_services_text');
                $services_image = carbon_get_post_meta(get_the_ID(), 'crb_services_img');

                if (!empty($services_text)) {
                    echo '<div class="section-services__inner__right__text">' . $services_text . '</div>';
                }
                ?>
                <!-- <div class="divider"></div> -->
                <?php
                if (!empty($services_image)) {
                    $services_image_url = wp_get_attachment_image_url($services_image, 'full');
                    echo '<img class="services-block__img fromOpacity" src="' . $services_image_url . '" />';
                }
                ?>
            </div>

        </div>


    </div>
</section>