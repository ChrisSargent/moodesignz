<header>
  <nav>
    <input type="checkbox" id="moo-nav__toggle">
    <div id="moo-nav" class="moo-nav">
      <div class="moo-site__container--wide--nopad">
        <label for="moo-nav__toggle" class="moo-nav__toggle" role="presentation" aria-controls="moo-nav__list">
          <i class="moo-nav__toggle--bars"><span class="moo-nav__toggle--bar"></span></i>
          <span class="moo-nav__toggle--text"><?php _e('Expand Menu', 'moo-text'); ?></span>
        </label>
        <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => false, 'menu_id' => 'moo-nav__list', 'menu_class' => 'moo-nav__list')); ?>
      </div>
      <?php get_template_part('components/_moo-logo')?>
    </div>
  </nav>
</header>
