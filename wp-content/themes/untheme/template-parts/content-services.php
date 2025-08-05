<div class="fixed-container">
    
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-content">
		<?php the_content() ?>
	</div>
    <?php get_template_part('template-parts/color-chart') ?>
</article><!-- #post-<?php the_ID(); ?> -->
</div>