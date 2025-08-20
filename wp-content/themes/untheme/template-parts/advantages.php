 <section class="adv-section">

     <?php
        // Заголовок блока
        $adv_block_head = carbon_get_post_meta(get_the_ID(), 'crb_adv_block_head');
        if (!empty($adv_block_head)) : ?>
         <h2 class="title"><?php echo esc_html($adv_block_head); ?></h2>
     <?php endif; ?>

     <?php
        // Получаем список преимуществ
        $advantages = carbon_get_post_meta(get_the_ID(), 'crb_adv');

        if (!empty($advantages) && is_array($advantages)) : ?>

         <div class="fixed-container">
             <div class="advantages-list">
                 <?php foreach ($advantages as $adv) : ?>
                     <?php
                        // если всё пустое — пропускаем
                        if (empty($adv['crb_adv_icon']) && empty($adv['crb_adv_head']) && empty($adv['crb_adv_desc'])) {
                            continue;
                        }
                        ?>
                     <div class="advantage-item">
                         <?php if (!empty($adv['crb_adv_icon'])) : ?>
                             <?php $icon_url = wp_get_attachment_image_url($adv['crb_adv_icon'], 'thumbnail'); ?>
                             <?php if ($icon_url) : ?>
                                 <div class="advantage-icon">
                                     <img src="<?php echo esc_url($icon_url); ?>" alt="">
                                 </div>
                             <?php endif; ?>
                         <?php endif; ?>

                         <?php if (!empty($adv['crb_adv_head'])) : ?>
                             <h3 class="advantage-head"><?php echo esc_html($adv['crb_adv_head']); ?></h3>
                         <?php endif; ?>

                         <?php if (!empty($adv['crb_adv_desc'])) : ?>
                             <div class="advantage-desc">
                                 <?php echo wp_kses_post($adv['crb_adv_desc']); ?>
                             </div>
                         <?php endif; ?>
                     </div>
                 <?php endforeach; ?>
             </div>
         </div>

     <?php endif; ?>

 </section>