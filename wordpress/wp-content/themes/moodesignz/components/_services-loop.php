<?php
  if (is_front_page()) {
    $services = array(
      'meta_query' => array(
        'key' => 'show_on_front_page',
        'value' => true,
      ),
      'post_type' => 'services',
      'meta_key' => 'display_order',
      'orderby' => 'meta_value_num',
      'order' => 'asc',
    );
  } else {
    $services = array(
      'post_type' => 'services',
      'meta_key' => 'display_order',
      'orderby' => 'meta_value_num',
      'order' => 'asc',
    );
  };
  $tiles = new WP_Query($services);
?>

<?php if ($tiles) : ?>
  <table class="moo-table">
  	<tbody>
  		<tr>
        <?php while ($tiles->have_posts()) : $tiles->the_post(); $slug = get_post_field('post_name', get_post()); ?>
    			<td>
            <input type="checkbox" id="moo-service-<?php echo $slug; ?>" class="moo-toggle">
            <label for="moo-service-<?php echo $slug; ?>" role="presentation"><span><?php the_title(); ?></span><i class="moo-i-chevron--down"></i></label>
            <div class="moo-content">
              <?php the_content(); ?>
              <?php if (get_field('pricing')) : ?>
                <div class="moo-pricing">
                  <?php the_field('pricing'); ?>
                </div>
              <?php endif; ?>
            </div>
          </td>
        <?php endwhile; ?>
  		</tr>
  	</tbody>
  </table>
<?php endif; $tiles->reset_postdata(); ?>
