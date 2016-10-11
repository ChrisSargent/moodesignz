<?php if (have_rows('accreditations', 'option')) : ?>
  <div class="moo-accredit">
    <ul>
    <?php while (have_rows('accreditations', 'option')) : the_row();
      $name = get_sub_field('name');
      $url = get_sub_field('link');
      $size = 'medium_large';
      $image = get_sub_field('logo');
      $image_alt = $image['alt'];
    	$image_src = $image['sizes'][ $size ];
    	$width = $image['sizes'][ $size . '-width' ];
    	$height = $image['sizes'][ $size . '-height' ];
    ?>
      <li>
        <a href="<?php echo $url ?>" target="_blank">
          <span><?php echo $name; ?></span>
          <img src="<?php echo $image_src; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo $image_alt; ?>">
        </a>
      </li>
    <?php endwhile; ?>
    </ul>
  </div>
<?php
  else :
    // no rows found
endif;
?>
