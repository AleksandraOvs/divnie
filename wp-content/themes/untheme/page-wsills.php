<?php

/**
 * Template name: Шаблон Подоконники
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
                    if ($header_text = carbon_get_theme_option('crb_wsills_text')) {
                        echo '<div class="template-header__text">' . $header_text . '</div>';
                    }
                    ?>
                </div>

                <?php
                if ($header_accent = carbon_get_theme_option('crb_wsills_accent')) {
                    echo '<div class="template-header__accent">' . $header_accent;

                    if ($header_accent_link = carbon_get_theme_option('crb_wsills_accent_link')) {
                        $header_accent_link_text = carbon_get_theme_option('crb_wsills_accent_link_text');
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


    </div>

</main><!-- #main -->


<?php
get_footer();
?>