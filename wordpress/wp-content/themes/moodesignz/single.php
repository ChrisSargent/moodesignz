<?php
  get_header();
  while (have_posts()): the_post();
  get_template_part('components/_hero-section');
    $tags = get_the_tags();
?>

<main class="moo-site__main">
	<div class="moo-site__container">
    <?php the_content();?>
    <?php if ($tags) : ?>
      <p class="moo-tags">
        <?php foreach ($tags as $tag) : $tag_link = get_tag_link( $tag->term_id ); ?>
          <span href="<?php echo $tag_link; ?>" class="moo-tag"><?php echo $tag->name; ?></span>
        <?php endforeach ?>
      </p>
    <?php endif; ?>
    <?php get_template_part('components/_gallery-loop'); ?>

  </div>
</main>

<?php
  endwhile;
  get_footer();
?>
