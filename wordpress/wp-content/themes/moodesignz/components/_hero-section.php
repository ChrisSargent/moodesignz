<?php
  $hero_image = moo_get_hero($post->ID);
  $frontPage = false;
  $content = get_the_content();
  if (is_front_page()) {
    $frontPage = true;
  }
  $modifier = ($frontPage ? '--frontpage' : '')
?>


<section class="moo-page__hero<?php echo $modifier; ?>">
	<div id="moo-page__hero-inner" class="moo-page__hero-inner">
		<div class="moo-site__container">
			<h1 class="moo-page__title"><?php the_title(); ?></h1>
      <?php if($frontPage && $content) : ?>
  			<div class="moo-page__subtitle">
          <?php echo $content; ?>
        </div>
      <?php endif; ?>
		</div>
    <?php if($frontPage) : ?>
  		<a href="#moo-site__main" class="moo-page__see-more">
  			<span>See</span>
  			<span class="moo-button--see-more"><i class="moo-i-chevron--down"></i></span>
  			<span>More</span>
  		</a>
    <?php endif; ?>
	</div>
</section>
<div id="moo-page__hero-bg" class="moo-page__hero-bg<?php echo $modifier; ?>" style="background-image:url('<?php echo $hero_image; ?>')"></div>
