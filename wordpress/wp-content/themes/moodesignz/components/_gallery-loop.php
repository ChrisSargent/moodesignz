<?php $images = get_field('photos'); if ($images): ?>
  <ul class="moo-tiles__container">
    <?php foreach ($images as $image):
      $socialDesc = get_field('social_description', $image['ID']);
      if (empty($socialDesc)) {
        $socialDesc = get_field('default_social_description', 'option');
      } else $socialDesc = $socialDesc . " (design by Dorota at MooDesignz)" ;

      $imageURL = moo_get_lb_url($image['ID']);
      $imageTitle = get_the_title() . " by Moodesignz."; // Gets the title of the post, not the image
      $imageAlt = $socialDesc;
      $imageCaption = $image['caption'];
    ?>
      <li class="moo-tile__container--gallery">
        <a href="<?php echo $imageURL; ?>" class="moo-tile--gallery"
          data-lightbox="gallery"
          data-title="<?php echo $imageTitle; ?>"
          data-caption="<?php echo $imageCaption; ?>"
          data-alt="<?php echo $imageAlt; ?>">
          <img src="<?php echo $image['sizes']['medium']; ?>" title="<?php echo $imageTitle; ?>" alt="<?php echo $imageAlt; ?>" />
        </a>
        <div class="moo-socialshare__container">
          <a href="https://www.pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $imageURL; ?>&description=<?php echo $imageAlt; ?>" class="moo-socialshare__pinterest" target="_blank"></a>
          <a href="http://www.houzz.com/imageClipperUpload?link=<?php the_permalink(); ?>&imageUrl=<?php echo $imageURL; ?>&title=<?php $imageTitle ?>&description=<?php echo $imageAlt; ?>&ref=<?php the_permalink(); ?>" class="moo-socialshare__houzz" target="_blank"><i class="moo-i-houzz-color"></i><span>Save</span></a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
<?php
  endif;
  get_template_part('components/_lightbox');
?>
