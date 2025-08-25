<?php get_header() ?>

<?php get_template_part('template-parts/front-blocks/01hero-block'); ?>
<?php get_template_part('template-parts/front-blocks/02nums'); ?>
<?php get_template_part('template-parts/products/products'); ?>
<?php get_template_part('template-parts/front-blocks/03banner'); ?>

<?php
//echo do_blocks( get_block_pattern('имя/паттерна') );
?>

<section class="section-about">
    <div class="fixed-container">
        <h2 class="title">О компании</h2>
        <?php
        $pattern_post = get_page_by_title('about-company', OBJECT, 'wp_block');

        if ($pattern_post) {
            echo do_blocks($pattern_post->post_content);
        }
        ?>
    </div>
</section>

<?php get_template_part('template-parts/front-blocks/04projects'); ?>

<?php get_template_part('template-parts/advantages'); ?>

<?php //get_template_part('template-parts/front-blocks/0services'); ?>
<?php //get_template_part('template-parts/front-blocks/03why-block'); ?>
<?php get_template_part('template-parts/front-blocks/04testimonials'); ?>
<?php get_template_part('template-parts/front-blocks/05form-block'); ?>
<?php get_template_part('template-parts/front-blocks/06projects'); ?>
<?php get_template_part('template-parts/front-blocks/07faq'); ?>


<?php get_footer() ?>