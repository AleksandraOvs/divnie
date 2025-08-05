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

    Container::make('theme_options', 'Stages of work')

        ->set_page_menu_position(3)
        ->set_icon('dashicons-editor-ol')
        ->add_fields(array(

            Field::make('text', 'crb_stages_heading', 'Block Heading'),
            Field::make('complex', 'crb_stages_list', 'Steps')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'crb_stage_heading', 'Head of step')
                        ->set_width(30),
                    Field::make('rich_text', 'crb_stage_text', 'Text')
                        ->set_width(70),
                ))
        ));

    /*POST META*/

    Container::make('post_meta', 'Main page content')
        ->show_on_page(get_option('page_on_front'))

        ->add_tab(__('Hero Slider'), array(

            Field::make('complex', 'crb_hero_slides', 'Слайды первого экрана')
                ->add_fields(array(
                    // Field::make("checkbox", "crb_darker_pic", "Включить затемнение слайда")
                    //     ->set_option_value('yes'),
                    Field::make('image', 'crb_hero_img', 'Изображение слайда')
                        ->set_width(50),
                    Field::make('image', 'crb_hero_img_mob', 'Изображение слайда (mobile)')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_content_heading', 'Заголовок')
                        ->set_width(50),
                    Field::make('rich_text', 'crb_hero_content_desc', 'Описание')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_content_link', 'Ссылка')
                        ->set_width(50),
                    Field::make('text', 'crb_hero_content_link_text', 'Текст ссылки')
                        ->set_width(50),
                )),

            Field::make("checkbox", "crb_show_form_on_hero", "Showing Form on Hero")
                ->set_option_value('yes'),
            Field::make('text', 'crb_feedback_heading', 'Feedback Heading')
                ->set_width(50),
            Field::make('rich_text', 'crb_feedback_desc', 'Feedback Description')
                ->set_width(50),
        ))

        ->add_tab(__('Наша работа в цифрах'), array(
            Field::make('text', 'crb_numbers_heading', 'Feedback Heading'),
            Field::make('complex', 'crb_nums_items', 'Работа в цифрах')
                ->add_fields(array(
                    Field::make('image', 'crb_nums_item_icon', 'Иконка пункта'),
                    Field::make('text', 'crb_num', 'Цифра пункта'),
                    Field::make('text', 'crb_num_value', 'Значение пункта'),
                    Field::make('text', 'crb_num_desc', 'Описание пункта'),
                ))
        ))

        ->add_tab('Services', array(

            Field::make('text', 'crb_services_head', 'Heading')
                ->set_width(50),
            Field::make('rich_text', 'crb_services_text', 'Text')
                ->set_width(50),
            Field::make('image', 'crb_services_img', 'Picture for block')
                ->set_width(100),

            Field::make('rich_text', 'crb_services_summary', 'Summary text')
                ->set_width(100),
        ))

        ->add_tab(__('Why Choose'), array(
            Field::make('text', 'crb_why_heading', 'Why heading'),
            Field::make('complex', 'crb_why_items', 'Items')
                ->set_layout('grid')
                ->add_fields(array(
                    Field::make('image', 'crb_why_icon', 'Icon')
                        ->set_width(50),
                    Field::make('text', 'crb_why_text', 'Text')
                        ->set_width(50),
                )),
            Field::make('rich_text', 'crb_text_content', 'Why block text content')
        ))

        ->add_tab(__('FAQ'), array(
            Field::make('text', 'crb_faq_head', 'FAQ heading'),
            Field::make('complex', 'crb_faq_items', 'Items')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('text', 'crb_question', 'Question')
                        ->set_width(30),
                    Field::make('rich_text', 'crb_answer', 'Answer')
                        ->set_width(100),
                )),

            Field::make('text', 'crb_faq-block_heading', 'Form heading')
                ->set_width(33),
            Field::make('rich_text', 'crb_faq-block_description', 'Form description')
                ->set_width(33),
            Field::make('text', 'crb_faq-block_shortcode')
                ->set_width(33)
        ));

    Container::make('post_meta', 'Service Content')
        ->where('post_type', '=', 'page')
        //     ->where('post_term', '=', [
        //         'taxonomy' => 'category',
        //         'field'    => 'slug',
        //         'value'    => 'services',
        //     ])
        // ->show_on_post_type('services')
        ->add_fields(array(
            Field::make('rich_text', 'crb_service_description', 'Service description'),

            Field::make('text', 'crb_cc_heading', 'Section heading')
                ->set_width(50),
            Field::make('rich_text', 'crb_cc_desc', 'Section description')
                ->set_width(50),

            Field::make('complex', 'crb_color_chart', 'Color Chart')
                ->add_fields(array(
                    Field::make('color', 'crb_color', 'Set Color')
                        ->set_width(50),
                    Field::make('image', 'crb_color_pic', 'Set Pic Color')
                        ->set_width(50),
                    Field::make('text', 'crb_color_name', 'Color name')
                        ->set_width(50),
                ))
        ));

    Container::make('post_meta', 'Projects')
        ->show_on_post_type('portfolio')

        ->add_fields(array(
            Field::make('rich_text', 'crb_project_desc', 'Краткое описание проекта'),

            Field::make('complex', 'crb_projects_pics', 'Project')
                ->set_layout('tabbed-vertical')
                ->add_fields(array(
                    Field::make('image', 'crb_project_image', 'Project Image')
                        ->set_width(33),
                    Field::make('rich_text', 'crb_project_image_desc', 'Image Description')
                        ->set_width(33),
                    Field::make('text', 'crb_project_image_alt', 'Image Alt')
                        ->set_width(33),
                ))
        ));
}
