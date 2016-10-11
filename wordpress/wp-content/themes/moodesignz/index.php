<?php
  get_header();
  while (have_posts()): the_post();
  get_template_part('components/_hero-section');
    $link_text = get_field('link_text');
?>

<main class="moo-site__main">
	<div class="moo-site__container">
    <?php the_content();
      if ($link_text) : ?>
        <a class="moo-link-block" href="<?php the_field('link_target'); ?>"><?php the_field('link_text'); ?></a>
      <?php endif;

      get_template_part('components/_portfolio-loop');

      if (get_field('include_services_tiles')) {
        get_template_part('components/_services-loop');
      };

      if (get_field('include_contact_form')) {
        get_template_part('components/_contact-form');
      };
    ?>
  </div>
</main>

<?php
  endwhile;
  get_footer();
?>
