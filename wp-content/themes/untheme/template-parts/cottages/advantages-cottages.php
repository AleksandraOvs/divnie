<section class="adv-section _cottages-adv">
    <div class="fixed-container">
        <?php
        // Получаем список преимуществ
        $adv_block_text = carbon_get_theme_option('crb_cotgsadv_block_text');
        $advantages_col1 = carbon_get_theme_option('crb_cotgsadv_text_left');
        $advantages_col2 = carbon_get_theme_option('crb_cotgsadv_text_right');

        $adv_block_head = carbon_get_theme_option('crb_cotgsadv_block_head');

        if (!empty($adv_block_head)) : ?>
            <h2 class="title"><?php echo esc_html($adv_block_head); ?></h2>
        <?php endif; ?>


        <?php
        if (!empty($adv_block_text)) : ?>
            <div class="_cottages-adv__text"><?php echo $adv_block_text; ?></div>
        <?php endif; ?>

        <div class="_cottages-adv__inner">
            <?php
            if (!empty($advantages_col1)) : ?>
                <div class="adv-text__left toRight">
                    <?php echo $advantages_col1 ?>
                </div>
            <?php endif; ?>

            <?php
            if (!empty($advantages_col2)) : ?>
                <div class="adv-text__right toLeft">
                    <?php echo $advantages_col2 ?>
                </div>
            <?php endif; ?>

        </div>


</section>