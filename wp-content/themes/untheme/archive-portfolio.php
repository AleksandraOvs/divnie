<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package untheme
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="page-section _portfolio">


		<?php if (have_posts()) : ?>

			<header class="page-header">
				<div class="fixed-container">
					<ul class="breadcrumbs__list">
						<?php echo site_breadcrumbs(); ?>
					</ul>
					<?php
					the_archive_title('<h2 class="page-title">', '</h2>');
					?>
				</div>
			</header><!-- .page-header -->
			<div class="page-section__content">
				<div class="fixed-container">
					<!-- <h3 class="archive-description">
						The leading seamless gutter company in your area!
					</h3> -->

					<ul class="archive-list" id="archive-list">

						<?php
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

						$query_args = array(
							'post_type' => 'portfolio', // замените на нужный тип
							'posts_per_page' => 6,
							'paged' => $paged
						);
						$ajax_query = new WP_Query($query_args);
						?>

						
							<?php
							if ($ajax_query->have_posts()) :
								while ($ajax_query->have_posts()) : $ajax_query->the_post(); ?>
									<li class="archive-list__item">
<!-- 
									<a href="<?php //the_permalink() ?>"><?php //the_post_thumbnail() ?>

									</a -->
									<?php
									$project_slides = carbon_get_post_meta(get_the_ID(), 'crb_projects_pics');
									// echo '<pre>';
									// var_dump($project_slides);
									// echo '</pre>';

									if (!empty($project_slides)) {
									?>
										<div class="swiper project-slider">
											<div class="swiper-wrapper">
												<?php
												foreach ($project_slides as $project_slide) {
													$project_slide_pic = wp_get_attachment_image_url($project_slide['crb_project_image'], 'full');
												?>
													<div class="swiper-slide single-project-slider__slide">
														<a href="<?php echo $project_slide_pic ?>" data-fancybox="gallery">
															<img src="<?php echo $project_slide_pic ?>" alt="Our project">
														</a>
													
													</div>
												<?php
												}
												?>
											</div>
										</div>
									<?php
									} else {
										echo 'nothing';
									}

									?>


								</li>
							<?php endwhile;
								wp_reset_postdata();
							endif;
							?>
						</ul>

						<?php if ($ajax_query->max_num_pages > 1) : ?>
							<div class="load-more-wrapper">
								<button class="btn" id="load-more" data-page="1" data-max="<?php echo $ajax_query->max_num_pages; ?>">
									Load More
								</button>
							</div>
						<?php endif; ?>

					<?php
					echo '</ul>';

					//the_posts_navigation();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
					?>
				</div>
			</div>

	</section>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
