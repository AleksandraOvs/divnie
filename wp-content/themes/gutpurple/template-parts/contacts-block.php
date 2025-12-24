<?php

$contacts = carbon_get_theme_option('crb_contacts');

$oh = carbon_get_theme_option('crb_oh_text');
$oh_icon = carbon_get_theme_option('crb_oh_icon');

$address = carbon_get_theme_option('crb_address_text');
$address_icon = carbon_get_theme_option('crb_address_icon');
?>
<ul class="contacts-list">
    <?php
    if (!empty($address)) {
        echo '<li class="contacts-list__item">';
        if (!empty($address_icon)) {
            $address_icon_url = wp_get_attachment_image_url($address_icon, 'full');

            echo '<img class="contacts-list__item__img" src="' . $address_icon_url . '" />';
        }

        echo '<span>' . $address . '</span>';
        echo '</li>';
    }
    ?>

    <?php
    if (!empty($oh)) {
        echo '<li class="contacts-list__item">';
        if (!empty($oh_icon)) {
            $oh_icon_url = wp_get_attachment_image_url($oh_icon, 'full');

            echo '<img class="contacts-list__item__img" src="' . $oh_icon_url . '" />';
        }

        echo '<span>' . $oh . '</span>';
        echo '</li>';
    }
    ?>
    <?php
    if (!empty($contacts)) {
        foreach ($contacts as $contact) {
            $contact_icon_url = wp_get_attachment_image_url($contact['crb_contact_image'], 'full');
            $item_class = 'contacts-list__item';
            if (!empty($contact['crb_contact_hide_header'])) {
                $item_class .= ' display-none';
            }
            echo '<li class="' . esc_attr($item_class) . '">';
            echo '<img class="contacts-list__item__img" src="' . $contact_icon_url . '" />';
            echo '<div class="contact-content">';
            if (!empty($contact['crb_contact_name'])) {
                echo '<p>' . $contact['crb_contact_name'] . ': </p>';
            }
            echo '<a class="contact-link" href="' . $contact['crb_contact_link'] . '">' . $contact['crb_contact_link_text'] . '</a>';
            echo '</div>';

            echo '</li>';
        }
    }
    ?>
</ul>