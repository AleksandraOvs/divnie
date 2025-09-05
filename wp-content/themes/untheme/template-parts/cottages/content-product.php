<?php
// Получаем все продукты
$products = carbon_get_theme_option('crb_cotgs_products');

if ($products) : ?>
    <div class="product-cards">
        <?php foreach ($products as $product) : ?>
            <div class="product-card _cotgs_product-card">

                <div class="product-card__image">
                    <div class="product-card__info">
                        <!-- Название продукции -->
                        <?php if (!empty($product['crb_cotgs_product_name'])) : ?>
                            <h3 class="product-name"><?php echo esc_html($product['crb_cotgs_product_name']); ?></h3>
                        <?php endif; ?>

                        <!-- Цена продукции -->
                        <?php if (!empty($product['crb_cotgs_product_price'])) : ?>
                            <p class="product-price"><?php echo esc_html($product['crb_cotgs_product_price']); ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- Изображение продукции -->
                    <?php $product_image = $product['crb_cotgs_product_image'] ?>
                    <?php if (!empty($product_image)) : ?>
                        <?php $product_image_url = wp_get_attachment_image_url($product_image, 'full') ?>

                        <img src="<?php echo $product_image_url ?>" alt="<?php echo esc_attr($product['crb_cotgs_product_name']); ?>">
                    <?php endif; ?>
                </div>

                <!-- Описание продукции -->
                <?php if (!empty($product['crb_cotgs_product_desc'])) {
                    echo '<div class="about-product">' . $product['crb_cotgs_product_desc'] . '</div>';
                }

                ?>
                <!-- Преимущества -->
                <?php if (!empty($product['crb_cotgs_product_adv']) && is_array($product['crb_cotgs_product_adv'])) : ?>
                    <ul class="product-advantages">
                        <?php foreach ($product['crb_cotgs_product_adv'] as $adv) : ?>
                            <?php
                            // пропускаем пустые
                            if (
                                empty($adv['crb_cotgs_product_adv_icon'])
                                && empty($adv['crb_cotgs_product_adv_key'])
                                && empty($adv['crb_cotgs_product_adv_value'])
                            ) {
                                continue;
                            }
                            ?>
                            <li>
                                <?php if (!empty($adv['crb_cotgs_product_adv_icon'])) : ?>
                                    <div class="adv-icon">
                                        <img src="<?php echo esc_url(wp_get_attachment_image_url($adv['crb_cotgs_product_adv_icon'], 'thumbnail')); ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <div class="adv-key-value">
                                    <?php if (!empty($adv['ccrb_cotgs_product_adv_text'])) : ?>
                                        <p><?php echo esc_html($adv['crb_cotgs_product_adv_text']); ?>:</p>
                                    <?php endif; ?>
                                </div>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <!-- Ссылка для продукции -->
                <?php if (!empty($product['crb_cotgs_name_link'])) : ?>
                    <a class="btn" href="<?php echo $product['crb_cotgs_name_link']; ?>">
                        <?php
                        echo !empty($product['crb_cotgs_name_link_text'])
                            ? esc_html($product['crb_cotgs_name_link_text'])
                            : esc_html($product['crb_cotgs_product_name']);
                        ?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>