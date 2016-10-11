<?php
  $rooms = array(
    'post_type' => 'rooms',
    'meta_key' => 'display_order',
    'orderby' => 'meta_value_num',
    'order' => 'asc',
  );
  $projects = array(
    'post_type' => 'projects',
    'meta_key' => 'display_order',
    'orderby' => 'meta_value_num',
    'order' => 'asc',
  );

  if (is_front_page()) {
    $rooms['meta_query'] = array(
        'key' => 'show_on_front_page',
        'value' => true,
      );
    $projects['meta_query'] = array(
        'key' => 'show_on_front_page',
        'value' => true,
      );
  }
  $tiles = new WP_Query();
  $tiles->posts = [];
  if (get_field('include_project_tiles')) {
    $projects_query = new WP_Query($projects);
    $tiles->posts = array_merge($tiles->posts, $projects_query->posts);
  };
  if (get_field('include_room_tiles')) {
    $rooms_query = new WP_Query($rooms);
    $tiles->posts = array_merge($tiles->posts, $rooms_query->posts);
  };
  $tiles->post_count = count($tiles->posts);
?>

<?php if ($tiles->have_posts()) : ?>
  <ul class="moo-tiles__container">
    <?php while ($tiles->have_posts()) : $tiles->the_post();
      $tilebg = moo_get_tilebg($post->ID); ?>
      <li class="moo-tile__container" style="background-image:url('<?php echo $tilebg; ?>')">
        <a href="<?php the_permalink(); ?>" class="moo-tile">
          <h2 class="moo-tile__title"><?php the_title(); ?></h2>
        </a>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; $tiles->reset_postdata(); ?>
