<?php
// Получаем все продукты
$products = carbon_get_post_meta(get_the_ID(), 'crb_product');

if ($products) : ?>
    <div class="product-cards">
        <?php foreach ($products as $product) : ?>
            <div class="product-card">

                <div class="product-card__image">
                    <div class="product-card__info">
                        <!-- Название продукции -->
                        <?php if (!empty($product['crb_product_name'])) : ?>
                            <h3 class="product-name"><?php echo esc_html($product['crb_product_name']); ?></h3>
                        <?php endif; ?>

                        <!-- Цена продукции -->
                        <?php if (!empty($product['crb_product_price'])) : ?>
                            <p class="product-price"><?php echo esc_html($product['crb_product_price']); ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- Изображение продукции -->
                    <?php $product_image = $product['crb_product_image'] ?>
                    <?php if (!empty($product_image)) : ?>
                        <?php $product_image_url = wp_get_attachment_image_url($product_image, 'full') ?>

                        <img src="<?php echo $product_image_url ?>" alt="<?php echo esc_attr($product['crb_product_name']); ?>">
                    <?php endif; ?>
                </div>

                <!-- Преимущества продукции -->
                <!-- Преимущества -->
                <?php if (!empty($product['crb_product_adv']) && is_array($product['crb_product_adv'])) : ?>
                    <ul class="product-advantages">
                        <?php foreach ($product['crb_product_adv'] as $adv) : ?>
                            <?php
                            // пропускаем пустые
                            if (
                                empty($adv['crb_product_adv_icon'])
                                && empty($adv['crb_product_adv_key'])
                                && empty($adv['crb_product_adv_value'])
                            ) {
                                continue;
                            }
                            ?>
                            <li>
                                <?php if (!empty($adv['crb_product_adv_icon'])) : ?>
                                    <div class="adv-icon">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url($adv['crb_product_adv_icon'], 'thumbnail')); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="adv-key-value">
                                    <?php if (!empty($adv['crb_product_adv_key'])) : ?>
                                        <p><?php echo esc_html($adv['crb_product_adv_key']); ?>:</p>
                                    <?php endif; ?>
                                    <?php if (!empty($adv['crb_product_adv_value'])) : ?>
                                        <span><?php echo wp_kses_post($adv['crb_product_adv_value']); ?></span>
                                    <?php endif; ?>
                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <!-- Ссылка для продукции -->
                <?php if (!empty($product['crb_product_name_link'])) : ?>
                    <a class="btn" href="<?php echo esc_url($product['crb_product_name_link']); ?>">
                        <?php
                        echo !empty($product['crb_product_name_link_text'])
                            ? esc_html($product['crb_product_name_link_text'])
                            : esc_html($product['crb_product_name']);
                        ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>