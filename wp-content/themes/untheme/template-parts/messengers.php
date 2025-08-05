<?php
                if ($messengers = carbon_get_theme_option('crb_messengers_contacts')) {
                ?>
              
                    
                    <ul class="messengers-list">
                        <?php 
                            if ($add = carbon_get_theme_option('crb_address')){
                                echo '<li class="address">'.$add.'</li>';
                            }
                        ?>
                        <?php
                        foreach ($messengers as $messenger) {
                        ?>
                            <li class="messengers-list__item">
                            <p><?php echo $messenger['crb_contact_name'] ?>:</p>

                            <a href="<?php echo $messenger['crb_contact_link'] ?>" class="messengers-list__item__link"><?php echo $messenger['crb_contact_link_text'] ?>
                                </a>
                            </li>
                            
                        <?php
                        }
                        ?>
                    </ul>
                
                <?php
                }
                ?>