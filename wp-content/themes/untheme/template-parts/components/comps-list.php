<?php
$comps = carbon_get_theme_option('crb_comps');

if ($comps) : ?>
    <section class="components-section">
        <div class="fixed-container">
            <h2 class="title">Комплектующие для окон из ПВХ</h2>
            <div class="comps-list">
                <?php foreach ($comps as $comp) :
                    $img_id     = $comp['crb_comps_img'];
                    $img_url    = wp_get_attachment_image_url($img_id, 'full');
                    $title      = $comp['crb_comps_head'];
                    $link       = $comp['crb_comps_head_link'];
                    $text       = $comp['crb_comps_text'];
                    $form_link  = $comp['crb_comps_form_link'];
                ?>
                    <div class="comp-item">
                        <?php if ($img_url) : ?>
                            <div class="comp-img">
                                <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="comp-item__content__about">
                            <?php if ($title) : ?>
                                <h3>
                                    <?php if ($link) : ?>
                                        <a href="<?php echo esc_url($link); ?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    <?php else : ?>
                                        <?php echo esc_html($title); ?>
                                    <?php endif; ?>
                                </h3>
                            <?php endif; ?>
                            <?php if ($text) : ?>
                                <div class="comp-text">
                                    <?php echo wp_kses_post($text); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($form_link) : ?>
                                <div class="comp-form">
                                    <a class="btn" href="<?php echo esc_url($form_link); ?>" class="comp-form-link">
                                        Получить консультацию
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>


                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>