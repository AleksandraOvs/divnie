<?php
/**
 * Plugin Name: Swiper Gutenberg Block Advanced
 * Description: Gutenberg-блок слайдера на базе Swiper.js с адаптивностью, lazy-load и настройками autoplay/autoHeight.
 * Version: 2.0.0
 * Author: ChatGPT
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

function swiper_block_register() {
    register_block_type(__DIR__);
    register_block_type(__DIR__ . '/slide');
}
add_action('init', 'swiper_block_register');

function swiper_enqueue_scripts() {
    wp_enqueue_style(
        'swiper-style',
        'https://unpkg.com/swiper/swiper-bundle.min.css',
        array(),
        null
    );

    wp_enqueue_script(
        'swiper',
        'https://unpkg.com/swiper/swiper-bundle.min.js',
        array(),
        null,
        true
    );

    wp_enqueue_script(
        'swiper-init',
        plugins_url('init-swiper.js', __FILE__),
        array('swiper'),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'swiper_enqueue_scripts');
