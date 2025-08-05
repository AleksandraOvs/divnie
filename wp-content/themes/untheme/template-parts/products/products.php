<?php

$products = carbon_get_theme_option('crb_products');

if (!empty($products)) {
?>
    <section class="products-section">
        <div class="fixed-container">
            <h2 class="title">Наша продукция</h2>

            <ul class="products-list">
                <?
                foreach ($products as $product) {
                    $pr_head = $product['crb_product_name'];
                    $pr_desc = $product['crb_product_desc'];
                    $pr_img = wp_get_attachment_image_url($product['crb_product_image'], 'full');
                    $pr_price = $product['crb_product_price'];
                    $pr_link = $product['crb_product_link'];
                    $pr_link_text = $product['crb_product_link_text'];
                ?>
                    <li class="products-list__item">
                        <a href="/" class="products-list__item__link">
                            <?php
                            if (!empty($pr_img)) {
                                echo '<img src="' . $pr_img . '" alt="' . $pr_head . '" alt="" />';
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/images/placeholder.svg" >';
                            }
                            ?>
                        </a>

                        <div class="products-list__item__content">
                            <?php
                            if (!empty($pr_head)) {
                                echo '<h3>' . $pr_head . '</h3>';
                            }
                            ?>
                            <?php
                            if (!empty($pr_desc)) {
                                echo '<p class="description">' . $pr_desc . '</p>';
                            }
                            ?>
                        </div>

                        <div class="products-list__item__info">
                            <?php
                            if (!empty($pr_link)) {
                            ?>
                                <a class="btn" href="<?php echo $pr_link ?>">
                                    <?php
                                    if (!empty($pr_link_text)) {
                                        echo $pr_link_text;
                                    }else {
                                        echo 'Заказать';
                                    }
                                    ?>
                                </a>
                            <?php
                            }
                            ?>

                            <?php
                            if (!empty($pr_price)) {
                                echo '<p class="price">' . $pr_price . '</p>';
                            }
                            ?>
                        </div>

                    </li>
                <?
                }
                ?>
            </ul>

        </div>
    </section>
<?php
}
