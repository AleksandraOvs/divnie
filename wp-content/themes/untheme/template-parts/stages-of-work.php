<section class="stages-section" id="stages-section">
     <div class="fixed-container">
         <?php
            if ($sw_head = carbon_get_theme_option('crb_stages_heading')) {
            ?>
             <h2 class="title fromTop"><?php echo $sw_head ?></h2>
         <?php
            }
            ?>

         <div class="stages-section__inner">
             <?php if ($stages_items = carbon_get_theme_option('crb_stages_list')) {
                ?>
                 
                     <ul class="stages-list">
                         <?php
                            $i = 0;
                            foreach ($stages_items as $stages_item) {
                                $i++;
                            ?>
                             <li class="stages-item fromOpacity">
                                 <div class="stages-item-head">
                                     <h4><span class="num-of-stages"><?php echo '0' . $i; ?></span><?php echo $stages_item['crb_stage_heading'] ?></h4>
                                     
                                 </div>
                                 <div class="stages-item-text">
                                     <p><?php echo $stages_item['crb_stage_text'] ?></p>
                                 </div>
                             </li>
                         <?php
                            }
                            ?>
                     </ul> 
             <?php
                }
                ?>
         </div>


     </div>
 </section>