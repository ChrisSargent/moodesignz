<?php
  global $post;
  $id = $post->ID;
  $postImageID = get_post_thumbnail_id( $id );
  if($postImageID) {
      $image = wp_get_attachment_metadata($postImageID)['sizes']['hero'];
      $imgUrl = wp_get_attachment_image_src($postImageID, 'hero')[0];
      $imgType = $image['mime-type'];
  } else {
      $image = get_field('default_social_share_image', 'options');
      $imgUrl = $image['url'] || wp_get_attachment_image_src($postImageID)['sizes']['hero'];;
      $imgType = $image['mime_type'] || $image['mime-type'];
  }
  $imgWidth = $image['width'];
  $imgHeight = $image['height'];
  $excerpt = moo_get_og_excerpt($post);
  $author = get_field('founder', 'options');
  $keywords = get_field('keywords', 'options');
  $pinterest = get_field('pinterest_verification_code', 'options');
  $bing = get_field('bing_verification_code', 'options');
  $fbadmin = get_field('facebook_admin_id', 'options');
  $fbprofile = get_field('facebook_page_id', 'options');
  $google = get_field('google_plus_page_id', 'options');
?>

<!-- Basic Meta Information -->
<meta name="description" content="<?php echo $excerpt; ?>" />
<meta name="author" content="<?php echo $author; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />

<!-- Open Graph Information -->
<meta property="og:title" content="<?php echo the_title(); ?>"/>
<meta property="og:description" content="<?php echo $excerpt; ?>"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="<?php echo the_permalink(); ?>"/>
<meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
<meta property="og:image" content="<?php echo $imgUrl; ?>"/>
<meta property="og:image:type" content="<?php echo $imgType; ?>" />
<meta property="og:image:width" content="<?php echo $imgWidth; ?>" />
<meta property="og:image:height" content="<?php echo $imgHeight; ?>" />

<!-- Facebook Open Graph Info -->
<meta property="fb:admins" content="<?php echo $fbadmin ?>" />
<meta property="fb:profile_id" content="<?php echo $fbprofile ?>" />


<!-- Pinterest Verification -->
<meta name="p:domain_verify" content="<?php echo $pinterest; ?>" />

<!-- Bing Verification -->
<meta name="msvalidate.01" content="<?php echo $bing; ?>" />

<!-- Google+ -->
<link rel="publisher" href="https://plus.google.com/<?php echo $google; ?>" />
