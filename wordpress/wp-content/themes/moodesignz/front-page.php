<?php
	get_header();
	while (have_posts()): the_post();
		get_template_part('components/_hero-section');
	?>

	<main id="moo-site__main" class="moo-site__main">
		<?php
			$args = array(
				'post_type' => 'front_page_section',
				'meta_key' => 'display_order',
				'orderby' => 'meta_value_num',
				'order' => 'asc',
			);
			$fpSections = new WP_Query($args);
			while ($fpSections->have_posts()) : $fpSections->the_post();
				$slug = get_post_field('post_name', get_post());
				$link_text = get_field('link_text');
		?>

		<section class="moo-home__section" id="<?php echo $slug; ?>">
			<div class="moo-site__container">
				<h1 class="moo-page__title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
				<?php	if ($link_text) : ?>
					<a class="moo-link-block" href="<?php the_field('link_target'); ?>"><?php the_field('link_text'); ?></a>
				<?php endif; ?>
				<?php get_template_part('components/_portfolio-loop'); ?>
				<?php
					if (get_field('include_contact_form')) {
						get_template_part('components/_contact-form');
					};

					if (get_field('include_services_tiles')) {
						get_template_part('components/_services-loop');
					};
				?>
			</div>
		</section>
		<?php endwhile; wp_reset_postdata(); ?>
	</main>

	<?php endwhile;
	get_footer();
?>
