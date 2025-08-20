<?php

/**
 * Template name: Шаблон rehau
 */

get_header();
?>

<main id="primary" class="site-main">

    <div class="page-section">
        <header class="page-header _template-header">
            <?php

            if (has_post_thumbnail()) {
                the_post_thumbnail();
            } else {
                echo '<img src="' . get_bloginfo("template_url") . '/images/svg/placeholder.svg" />';
            }
            ?>
            <div class="fixed-container">
                <div class="page-title__left">
                    <ul class="breadcrumbs__list">
                        <?php echo site_breadcrumbs(); ?>
                    </ul>
                    <?php
                    the_title('<h2 class="page-title">', '</h2>');
                    ?>
                    <?php
                    if ($header_text = carbon_get_post_meta(get_the_ID(), 'crb_header_text')) {
                        echo '<div class="template-header__text">' . $header_text . '</div>';
                    }
                    ?>
                </div>

                <?php
                if ($header_accent = carbon_get_post_meta(get_the_ID(), 'crb_header_accent')) {
                    echo '<div class="template-header__accent">' . $header_accent;

                    if ($header_accent_link = carbon_get_post_meta(get_the_ID(), 'crb_header_accent_link')) {
                        $header_accent_link_text = carbon_get_post_meta(get_the_ID(), 'crb_header_accent_link_text');
                ?>
                        <a class="btn" href="">
                            <?php
                            if (!empty($header_accent_link_text)) {
                                echo $header_accent_link_text;
                            } else {
                                echo 'Перейти';
                            }
                            ?>
                        </a>
                <?php

                    }
                    echo '</div>';
                }
                ?>

            </div>
        </header><!-- .page-header -->

        <div class="page-section__content">
            <?php
            $summary_adv = carbon_get_post_meta(get_the_ID(), 'crb_template_description');
            if (!empty($summary_adv)) {
                echo '<section class="summary_adv"><div class="fixed-container">';
                echo $summary_adv;
                echo '</div></section>';
            }
            ?>
            <section class="template-products">
                <div class="fixed-container">
                    <?php
                    // Название секции
                    $section_name = carbon_get_post_meta(get_the_ID(), 'crb_name_section');
                    if (!empty($section_name)) : ?>
                        <h2 class="title"><?php echo esc_html($section_name); ?></h2>
                    <?php endif; ?>
                    <?php get_template_part('template-parts/content-product') ?>
                </div>
            </section>

            <?php get_template_part('template-parts/advantages') ?>

            <?php get_template_part('template-parts/front-blocks/03banner'); ?>

            <?php get_template_part('template-parts/gallery'); ?>

            <?php
            $content = get_the_content();

            if (! empty(trim($content))) : ?>
                <section class="custom-content">
                    <div class="fixed-container">
                        <?php the_content(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php get_template_part('template-parts/front-blocks/04testimonials'); ?>




        </div>



    </div>

</main><!-- #main -->


<?php
get_footer();
?>