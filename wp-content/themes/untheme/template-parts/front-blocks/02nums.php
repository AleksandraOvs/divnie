<?php if ($nums = carbon_get_post_meta(get_the_ID(), 'crb_nums_items')) {
    $nums_section_heading = carbon_get_post_meta(get_the_ID(), 'crb_numbers_heading');
?>
    <section class="section-nums" id="numbers">
        <div class="fixed-container">
            <?php if (!empty($nums_section_heading)) {
                echo '<h2 class="title">' . $nums_section_heading . '</h2>';
            }
            ?>

            <ul class="nums">
                <?php
                foreach ($nums as $num) {

                    $num_img = wp_get_attachment_image_url($num['crb_nums_item_icon'], 'full');
                    $num_head = $num['crb_num'];
                    $num_value = $num['crb_num_value'];
                    $num_desc = $num['crb_num_desc'];
                ?>
                    <li class="num-item">
                        <div class="num-item__img">
                            <?php if (!empty($num_img)){
                                echo '<img src="'.$num_img.'" alt="" />';
                            }
                                ?>
                        </div>

                        <div class="num-item__content">

                        <div class="num-item__content__num">
                             <?php 
                                if (!empty($num_head)){
                                    echo '<p class="num-head">'.$num_head.'</p>';
                                }
                            ?>
                            <?php 
                                if (!empty($num_value)){
                                    echo '<p class="num-head">'.$num_value.'</p>';
                                }
                            ?>
                        </div>
                           
                            <?php 
                                if (!empty($num_desc)){
                                    echo '<p class="num-desc">'.$num_desc.'</p>';
                                }
                            ?>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </section>
<?
}
