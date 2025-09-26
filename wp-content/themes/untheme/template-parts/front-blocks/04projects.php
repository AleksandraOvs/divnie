  <?php
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC'
    );

    $projects_query = new WP_Query($args);

    //echo '<pre>';
    //print_r($projects_query);

    if ($projects_query->have_posts()) : ?>
      <section class="project-section">
          <div class="fixed-container">
              <h2 class="title">Наши проекты на ТВ</h2>
              <p class="description">Мы успешно работаем на российском рынке более 20 лет и стремимся удовлетворить запросы каждого заказчика. Наши клиенты могут заказать пластиковые окна по готовой программе «Комфортное решение». Это позволит установить или заменить остекление во всем доме или квартире, сэкономив на стоимости материалов и установке.</p>

              <div class="project-section__inner">
                  <div class="swiper projects-slider">
                      <div class="swiper-wrapper">
                          <?php
                            $count = 0;
                            if ($projects_query->have_posts()) :
                                echo '<div class="swiper-slide project-slider__slide-group">';
                                while ($projects_query->have_posts()) : $projects_query->the_post();
                                    if ($count > 0 && $count % 4 === 0) {
                                        echo '<div class="project-slide__item">';
                                        if (has_post_thumbnail()) :
                                            $thumb_full = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                          <a href="<?php echo esc_url($thumb_full); ?>" data-fancybox="gallery" data-caption="<?php the_title_attribute(); ?>">
                                              <?php the_post_thumbnail('medium'); ?>
                                              <div class="project-slide__content">
                                                  <h4 class="project-slide__title"><?php the_title(); ?></h4>

                                                  <?php if ($desc = carbon_get_post_meta(get_the_ID(), 'crb_project_desc')) : ?>
                                                      <div class="project-description"><?php echo $desc ?></div>
                                                  <?php endif; ?>
                                              </div>
                                          </a>
                                  <?php endif;
                                        echo '</div>';
                                        // Закрываем предыдущий слайд и открываем новый
                                        echo '</div><div class="swiper-slide project-slider__slide-group">';
                                    }
                                    ?>
                                  <div class="project-slide__item">
                                      <?php if (has_post_thumbnail()) :
                                            $thumb_full = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                                          <a href="<?php echo esc_url($thumb_full); ?>" data-fancybox="gallery" data-caption="<?php the_title_attribute(); ?>">
                                              <?php the_post_thumbnail('medium'); ?>
                                              <div class="project-slide__content">
                                                  <h4 class="project-slide__title"><?php the_title(); ?></h4>

                                                  <?php if ($desc = carbon_get_post_meta(get_the_ID(), 'crb_project_desc')) : ?>
                                                      <div class="project-description"><?php echo $desc ?></div>
                                                  <?php endif; ?>
                                              </div>
                                          </a>
                                      <?php endif; ?>
                                  </div>
                          <?php
                                    $count++;
                                endwhile;
                                echo '</div>'; // Закрыть последний слайд
                            endif;
                            ?>
                      </div>
                  </div>

                  <div class="slider-projects-prev">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                          <path d="M13.8792 23.1711L11.815 25.2333L0.571885 13.9941C0.390651 13.814 0.246822 13.5998 0.148675 13.3639C0.0505276 13.1281 0 12.8751 0 12.6196C0 12.3641 0.0505276 12.1111 0.148675 11.8752C0.246822 11.6393 0.390651 11.4252 0.571885 11.2451L11.815 0L13.8773 2.06225L3.32479 12.6167L13.8792 23.1711Z" fill="#fff" />
                      </svg>
                  </div>
                  <div class="slider-projects-next">
                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="26" viewBox="0 0 14 26" fill="none">
                          <path d="M-5.81741e-05 23.1711L2.06413 25.2333L13.3073 13.9941C13.4885 13.814 13.6323 13.5998 13.7305 13.3639C13.8286 13.1281 13.8792 12.8751 13.8792 12.6196C13.8792 12.3641 13.8286 12.1111 13.7305 11.8752C13.6323 11.6393 13.4885 11.4252 13.3073 11.2451L2.06413 0L0.00188732 2.06225L10.5544 12.6167L-5.81741e-05 23.1711Z" fill="#fff" />
                      </svg>
                  </div>


              </div>
          </div>
      </section>
      <?php wp_reset_postdata(); ?>
  <?php else : ?>
      <p>Nothing found</p>


  <?php endif; ?>