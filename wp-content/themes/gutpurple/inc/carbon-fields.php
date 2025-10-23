<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;



add_action('carbon_fields_register_fields', 'site_carbon');
function site_carbon()
{
    Container::make('theme_options', 'Contacts')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-megaphone')
        ->add_tab(__('Контакты'), array(
            Field::make('image', 'crb_oh_icon', 'Opening hours icon')
                ->set_width(30),
            Field::make('rich_text', 'crb_oh_text', 'Opening hours text')
                ->set_width(70),

            Field::make('image', 'crb_address_icon', 'Address icon')
                ->set_width(30),
            Field::make('rich_text', 'crb_address_text', 'Address text')
                ->set_width(70),

            Field::make('complex', 'crb_contacts', 'Contacts item')

                ->add_fields(array(
                    Field::make('image', 'crb_contact_image', 'Contact icon')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_name', 'Name of contact')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_link_text', 'Link text')
                        ->set_width(25),
                    Field::make('text', 'crb_contact_link', 'Link')
                        ->set_width(25),
                )),
        ))

        ->add_tab(__('Баннер'), array(
            Field::make('image', 'crb_banner_bg', 'Изображение для баннера')
                ->set_width(30),
            Field::make('rich_text', 'crb_banner_text', 'Блок текста баннера')
                ->set_width(70),
            Field::make('association', 'crb_association_forms', 'Формы')
                ->set_types(array(
                    array(
                        'type' => 'post',
                        'post_type' => 'wpcf7_contact_form', // для Contact Form 7
                    ),
                ))
                ->set_max(1), // <-- ограничение: максимум 1 объект     
        ))

        ->add_tab(__('Feedback form'), array(
            Field::make('text', 'crb_fdb_shortcode', 'Shortcode')
                ->set_width(50),
            Field::make('complex', 'crb_trust_badges', 'Trust Bages Pics')
                ->add_fields(array(
                    Field::make('image', 'crb_badge', 'Badge')
                )),

            Field::make("checkbox", "crb_show-form-block", "Show form on pages")
                ->set_option_value('yes'),
            Field::make('image', 'crb_form-block_image', 'Form Block Background')
                ->set_width(20),
            Field::make('text', 'crb_form-block_heading', 'Heading')
                ->set_width(40),
            Field::make('rich_text', 'crb_form-block_desc', 'Description')
                ->set_width(40),

        ))

        ->add_tab(__('Popup формы'), array(

            Field::make('text', 'crb_fb_first_link', 'Link of floating button#1')
                ->set_width(50),
            Field::make('text', 'crb_fb_first_link_text', 'Link text of floating button#1')
                ->set_width(50),


            Field::make('text', 'crb_fb_second_head', 'Heading of form')
                ->set_width(50),
            Field::make('rich_text', 'crb_fb_second_desc', 'Heading of form')
                ->set_width(50),
            Field::make('text', 'crb_fb_second_shortcode', 'Shortcode of floating button#2')
                ->set_width(50),
            Field::make('text', 'crb_fb_second_text', 'Button text of floating button#2')
                ->set_width(50),

        ));

    Container::make('theme_options', 'Продукция')

        ->set_page_menu_position(4)
        ->set_icon('dashicons-grid-view')
        ->add_fields(array(
            Field::make('complex', 'crb_products', 'Продукция')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'crb_product_name', 'Название товара'),
                    Field::make('rich_text', 'crb_product_desc', 'Описание товара'),
                    Field::make('image', 'crb_product_image', 'Изображение товара'),
                    Field::make('text', 'crb_product_price', 'Цена'),
                    Field::make('text', 'crb_product_link', 'Ссылка товара'),
                    Field::make('text', 'crb_product_link_text', 'Текс ссылки товара'),
                ))
        ));

    Container::make('theme_options', 'Отзывы')

        ->set_page_menu_position(2)
        ->set_icon('dashicons-admin-comments')
        ->add_fields(array(

            Field::make('text', 'crb_feed_heading', 'Block heading'),
            Field::make('image', 'crb_feed_img', 'Фоновое изображение'),
            Field::make('complex', 'crb_feeds_list', 'Testimonials')
                ->set_layout('tabbed-horizontal')
                ->add_fields(array(
                    Field::make('text', 'crb_feed_heading', 'Testimonial heading'),
                    Field::make('rich_text', 'crb_feed_text', 'Testimonial text'),
                    Field::make('text', 'crb_feed_sign', 'Testimonial Sign'),
                ))
        ));
};
