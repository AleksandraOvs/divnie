<?php
// Получаем все продукты
$products = carbon_get_theme_option('crb_balcony_products');
// echo '<pre>';
// print_r($products);

if ($products) : ?>
    <div class="product-cards _balcony_cards">
        <?php foreach ($products as $product) : ?>
            <div class="product-card product-balcony">

                <div class="product-card__image">

                    <!-- Изображение продукции -->
                    <?php $product_image = $product['crb_balcony_product_image'] ?>
                    <?php if (!empty($product_image)) { ?>
                        <?php $product_image_url = wp_get_attachment_image_url($product_image, 'full') ?>

                        <img src="<?php echo $product_image_url ?>" alt="<?php echo esc_attr($product['crb_balcony_product_name']); ?>">
                    <?php } else {
                    ?>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/svg/placeholder.svg">
                    <?php
                    } ?>
                </div>

                <div class="product-card__content">
                    <div class="product-card__info">
                        <!-- Название продукции -->
                        <?php if (!empty($product['crb_balcony_product_name'])) : ?>
                            <h3 class="product-name"><?php echo esc_html($product['crb_balcony_product_name']); ?></h3>
                        <?php endif; ?>

                        <!-- Описание -->
                        <?php if (!empty($product['crb_balcony_product_desc'])) : ?>
                            <div class="product-desc"><?php echo esc_html($product['crb_balcony_product_desc']); ?></div>
                        <?php endif; ?>
                    </div>

                    <!-- Преимущества -->
                    <?php if (!empty($product['crb_balcony_product_adv']) && is_array($product['crb_balcony_product_adv'])) : ?>
                        <ul class="product-advantages">
                            <?php foreach ($product['crb_balcony_product_adv'] as $adv) : ?>
                                <?php
                                // пропускаем пустые
                                if (
                                    empty($adv['crb_balcony_product_adv_icon'])
                                    && empty($adv['crb_balcony_product_adv_key'])
                                    && empty($adv['crb_balcony_product_adv_value'])
                                ) {
                                    continue;
                                }
                                ?>
                                <li>
                                    <?php if (!empty($adv['crb_balcony_product_adv_icon'])) : ?>
                                        <div class="adv-icon">
                                            <img src="<?php echo esc_url(wp_get_attachment_image_url($adv['crb_balcony_product_adv_icon'], 'thumbnail')); ?>" alt="">
                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($adv['crb_balcony_product_adv_text'])) : ?>
                                        <div class="adv-text">
                                            <?php echo $adv['crb_balcony_product_adv_text'] ?>
                                        </div>
                                    <?php endif; ?>


                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>


                    <div class="product-price">
                        <!-- Цена продукции -->
                        <?php if (!empty($product['crb_balcony_product_price'])) : ?>
                            <p class="product-price"><?php echo esc_html($product['crb_balcony_product_price']); ?></p>
                        <?php endif; ?>

                        <!-- Ссылка для продукции -->
                        <?php if (!empty($product['crb_balcony_name_link'])) : ?>
                            <a class="btn" href="<?php echo esc_url($product['crb_balcony_name_link']); ?>">
                                <?php
                                echo !empty($product['crb_balcony_name_link_text'])
                                    ? esc_html($product['crb_balcony_name_link_text'])
                                    : esc_html($product['crb_balcony_name']);
                                ?>
                            </a>
                        <?php endif; ?>
                    </div>



                </div>


            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>