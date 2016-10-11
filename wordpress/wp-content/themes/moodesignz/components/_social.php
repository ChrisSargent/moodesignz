<?php
  $fb = get_field('facebook_page_id', 'options');
  $pin = get_field('pinterest_user_id', 'options');
  $ho = get_field('houzz_id', 'options');
  $li = get_field('linkedin_page_id', 'options');
  $gp = get_field('google_plus_page_id', 'options');
  $tw = get_field('twitter_handle', 'options');
  $inst = get_field('instagram_user_id', 'options');
  $yt = get_field('youtube_page', 'options');
  $display = ($fb || $ho || $pin || $li || $gp || $tw || $inst || $yt);
  if ($display) :
?>

  <div class="moo-social__container">
    <h1 class="moo-social__header">Follow Us</h1>
    <?php
      if ($fb) :?><a href="https://wwww.facebook.com/<?php echo $fb; ?>" target="_blank"><i class="moo-i-facebook"></i></a><?php endif;
      if ($pin) :?><a href="https://www.pinterest.com/<?php echo $pin; ?>" target="_blank"><i class="moo-i-pinterest"></i></a><?php endif;
      if ($ho) :?><a href="https://www.houzz.com/pro/<?php echo $ho; ?>" target="_blank"><i class="moo-i-houzz"></i></a><?php endif;
      if ($li) :?><a href="https://www.linkedin.com/company/<?php echo $li; ?>" target="_blank"><i class="moo-i-linkedin"></i></a><?php endif;
      if ($gp) :?><a href="https://plus.google.com/<?php echo $gp; ?>" target="_blank"><i class="moo-i-google-plus"></i></a><?php endif;
      if ($tw) :?><a href="https://twitter.com/<?php echo $tw; ?>" target="_blank"><i class="moo-i-twitter"></i></a><?php endif;
      if ($inst) :?><a href="https://www.instagram.com/<?php echo $inst; ?>" target="_blank"><i class="moo-i-instagram"></i></a><?php endif;
      if ($yt) :?><a href="http://www.youtube.com/c/<?php echo $yt; ?>" target="_blank"><i class="moo-i-youtube"></i></a><?php endif;
    ?>
  </div>
<?php endif ?>
